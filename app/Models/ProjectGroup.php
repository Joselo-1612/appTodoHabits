<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGroup extends Model
{
    protected $table = 'project_groups';

    protected $primaryKey = 'prg_id';

    protected $fillable = ['prg_name', 'prg_color', 'prg_status'];
}
