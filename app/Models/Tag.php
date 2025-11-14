<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $table = 'tags';

    protected $primaryKey = 'tag_id';

    protected $fillable = ['tag_name', 'tag_color', 'tag_status'];
}
