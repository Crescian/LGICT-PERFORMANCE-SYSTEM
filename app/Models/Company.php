<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function businessUnit()
    {
        return $this->belongsTo(BusinessUnit::class);
    }
}
