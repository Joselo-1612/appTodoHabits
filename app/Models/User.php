<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasApiTokens, Notifiable, HasApiTokens;

    protected $primaryKey = 'usu_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'usu_name',
        'usu_email',
        'usu_password',
        'usu_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'usu_password',
        'usu_remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'usu_email_verified_at' => 'datetime',
            'usu_password' => 'hashed',
        ];
    }

    // ------------------------
    // Getters
    // ------------------------

    public function getUsuId()
    {
        return $this->usu_id;
    }

    public function getUsuName()
    {
        return $this->usu_name;
    }

    public function getUsuEmail()
    {
        return $this->usu_email;
    }

    public function getUsuPassword()
    {
        return $this->usu_password;
    }

    public function getUsuActive()
    {
        return $this->usu_active;
    }

    // ------------------------
    // Setters
    // ------------------------

    public function setUsuName($value)
    {
        $this->usu_name = $value;
        return $this;
    }

    public function setUsuEmail($value)
    {
        $this->usu_email = $value;
        return $this;
    }

    public function setUsuPassword($value)
    {
        $this->usu_password = $value;
        return $this;
    }

    public function setUsuActive($value)
    {
        $this->usu_active = $value;
        return $this;
    }
}
