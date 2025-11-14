<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HabitComplete extends Model
{
    protected $table = 'habit_completes';

    protected $primaryKey = 'hac_id';

    protected $fillable = [
        'hac_hab_id',
        'hac_date',
        'hac_status',
        'hac_notes'
    ];
}
