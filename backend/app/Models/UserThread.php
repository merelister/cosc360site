<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserThread extends Model
{
    protected $fillable = [
        'userID',
        'threadID'

    ];
}
