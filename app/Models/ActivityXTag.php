<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityXTag extends Model
{
    protected $table = 'activity_x_tags';

    protected $primaryKey = 'axt_id';

    protected $fillable = [
        'axt_tag_id',
        'axt_act_id',
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'tag_id');
    }
}
