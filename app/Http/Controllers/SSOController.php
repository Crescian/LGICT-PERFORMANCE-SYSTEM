<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class SSOController extends Controller
{
    public function redirectToTicketing()
    {
        $user = auth()->user();

        $token = Str::random(64);

        DB::table('sso_tokens')->insert([
            'user_id' => $user->id,
            'token' => $token,
            'expires_at' => now()->addMinutes(30),
            'used' => 0
        ]);

        return redirect("https://lg-ticketing.leoniogroup.com/sso-login?sso_token=$token");
    }

    public function handleSSO(Request $request)
    {
        $token = $request->query('sso_token');

        if (!$token) {
            abort(401, 'Missing SSO token');
        }

        $response = Http::post('http://usermgmt.development.com//api/verify-sso', [
            'sso_token' => $token
        ]);

        if ($response->failed()) {
            abort(401, 'SSO Failed');
        }

        $userId = $response->json('user.id');

        // Auth::loginUsingId($userId);

        // optional
        request()->session()->regenerate();

        return redirect()->route('employee.tickets.index');
    }
    public function verifySSO(Request $request)
    {
        $token = $request->sso_token;

        if (!$token) {
            return response()->json(['message' => 'Missing token'], 401);
        }

        $sso = DB::table('sso_tokens')
            ->where('token', $token)
            ->where('used', 0)
            ->where('expires_at', '>', now())
            ->first();

        if (!$sso) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        // ✅ Mark token as used
        DB::table('sso_tokens')
            ->where('token', $token)
            ->update(['used' => 1]);

        // ✅ Find user — add null check
        $user = DB::table('users')->where('id', $sso->user_id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // ✅ Get role name
        $role = DB::table('roles')->where('id', $user->role_id)->first();

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role_name' => $role ? $role->role_name : 'Employee', // ✅ role_name not name
                'position' => $user->position ?? 'N/A',
            ]
        ]);
    }
}
