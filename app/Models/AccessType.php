<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessType extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'users_access_types');
    }
}
