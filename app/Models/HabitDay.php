<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitDay extends Model
{
    protected $table = 'habit_days';

    protected $primaryKey = 'had_id';

    protected $fillable = [
        'had_hab_id',
        'had_day',
    ];
}
