<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySection extends Model
{
    protected $table = 'activity_sections';
    protected $primaryKey = 'acs_id';
    protected $fillable = [
        'acs_pro_id',
        'acs_name',
        'acs_status'
    ];
}
