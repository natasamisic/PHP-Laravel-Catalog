<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
   use HasFactory;

   public $timestamps = false;

   protected $table = 'products';
   protected $fillable = ['title', 'short_description', 'image'];
}
