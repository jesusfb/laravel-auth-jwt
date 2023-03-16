<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    // Table in DB
    protected $table = 'tb_users';

    // Not allowed to change field
    protected $guarded = ['id'];

    // Set timestamp
    public $timestamps = true;
}
