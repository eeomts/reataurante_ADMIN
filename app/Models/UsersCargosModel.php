<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersCargosModel extends Model
{
    protected $table = 'cargos_users';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'cargo_id');
    }
}
