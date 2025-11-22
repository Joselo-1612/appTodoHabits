<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityTask extends Model
{
    protected $table = 'activity_tasks';

    protected $primaryKey = 'ata_id';

    protected $fillable = [
        'ata_name',
        'ata_description',
        'ata_date',
        'ata_remind',
        'ata_is_done',
        'ata_status',
        'ata_act_id'
    ];

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'task_act_id', 'act_id');
    }
}
