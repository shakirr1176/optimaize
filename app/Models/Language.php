<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'short_code', 'icon', 'is_active', 'is_rtl'];
}
