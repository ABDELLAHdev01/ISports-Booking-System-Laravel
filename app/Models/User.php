<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'gender',
        'birthDate',
        'adress',
        'phone',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Articles(){
        return $this->hasMany(Article::class );
    }

    public function Courses(){
        return $this->hasMany(Course::class );
    }

    public function coaches(){
        return $this->hasMany(coach::class );
    }

    public function demandbecoaches(){
        return $this->hasMany(demandbecoach::class );
    }

    public function comments(){
        return $this->hasMany(comment::class );
    }

    

}
