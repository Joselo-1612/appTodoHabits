<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $primaryKey = 'pro_id';

    protected $fillable = [
        'pro_prg_id',
        'pro_use_id',
        'pro_name',
        'pro_description',
        'pro_priority',
        'pro_date_start',
        'pro_date_end',
        'pro_status'
    ];
}
