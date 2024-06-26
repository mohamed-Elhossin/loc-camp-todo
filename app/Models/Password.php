<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password extends Model
{
    use HasFactory;
    protected $table = "passwords";
    protected $fillable = ['title', 'password', 'category_id', 'deadline','from_date','to_date'];
}
