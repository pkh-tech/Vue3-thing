<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Support\Facades\Hash;  // ✅ Added

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{
    use HasFactory, Authenticatable, Authorizable;

    protected $table = 'users'; // Ensure it maps to the correct table

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'title', 
        'phone', 'dob', 'address', 'zipcode', 'city', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Automatically hash password before saving to DB
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * Get the identifier that will be stored in the JWT token.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key-value array containing any custom claims for the JWT.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
