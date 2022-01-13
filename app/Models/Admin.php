<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

use UA;

class Admin extends Authenticatable
{
    use HasFactory;


    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'ip',
        'user_agent',
        'profile'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getUserAgent($value)
    {
        $admin = Admin::find($value);
        if ($admin->user_agent) {
            $result = UA::parse($admin->user_agent);
            return $result->toString();
        }
    }
}
