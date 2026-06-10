<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'system_name',
        'system_status',
        'operational_hours',
        'support_email',
        'support_phone',
        'running_text',
        'welcome_description'

    ];
}