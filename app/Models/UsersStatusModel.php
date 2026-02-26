<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersStatusModel extends Model
{
    protected $table = 'status_users';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'status_id');
    }
}
