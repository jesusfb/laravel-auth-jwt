<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidatModel extends Model
{
    // Table in DB
    protected $table = 'tb_candidat';

    // Not allowed to change field
    protected $guarded = ['id'];

    // Set timestamp
    public $timestamps = true;
}
