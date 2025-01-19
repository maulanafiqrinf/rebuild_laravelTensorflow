<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'email',
        'hp',
        'pesan',
    ];
}
