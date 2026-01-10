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
        'hab_use_id',
        'hab_date'
    ];

    // ------------------------
    // Getters
    // ------------------------

    public function getHabId()
    {
        return $this->hab_id;
    }

    public function getHabName()
    {
        return $this->hab_name;
    }

    public function getHabDescription()
    {
        return $this->hab_description;
    }

    public function getHabIcon()
    {
        return $this->hab_icon;
    }

    public function getHabTypeRecurrence()
    {
        return $this->hab_type_recurrence;
    }

    public function getHabStatus()
    {
        return $this->hab_status;
    }

    public function getHabUseId()
    {
        return $this->hab_use_id;
    }

    public function getHabDate()
    {
        return $this->hab_date;
    }

    // ------------------------
    // Setters
    // ------------------------

    public function setHabName($value)
    {
        $this->hab_name = $value;
        return $this;
    }

    public function setHabDescription($value)
    {
        $this->hab_description = $value;
        return $this;
    }

    public function setHabIcon($value)
    {
        $this->hab_icon = $value;
        return $this;
    }

    public function setHabTypeRecurrence($value)
    {
        $this->hab_type_recurrence = $value;
        return $this;
    }

    public function setHabStatus($value)
    {
        $this->hab_status = $value;
        return $this;
    }

    public function setHabUseId($value)
    {
        $this->hab_use_id = $value;
        return $this;
    }

    public function setHabDate($value)
    {
        $this->hab_date = $value;
        return $this;
    }

    public function setHabId($value)
    {
        $this->hab_id = $value;
        return $this;
    }

    // ------------------------ relationships ------------------------

    public function habitCompletes()
    {
        return $this->hasMany(HabitComplete::class, 'hac_hab_id', 'hab_id');
    }

    public function habitDays()
    {
        return $this->hasMany(HabitDay::class, 'had_hab_id', 'hab_id');
    }
}
