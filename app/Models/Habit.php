<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $table = 'habits';

    protected $primaryKey = 'hab_id';

    protected $fillable = [
        'hab_name',
        'hab_description',
        'hab_icon',
        'hab_type_recurrence',
        'hab_status',
        'hab_use_id'
    ];
}
