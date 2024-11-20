<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

   public $timestamps = false;

   protected $table = 'comments';
   protected $fillable = ['name', 'email', 'text', 'is_approved'];
}
