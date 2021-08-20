<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
 
     /**
      * Get all of the comments for the Category
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function newstypes(): HasMany
     {
         return $this->hasMany(NewsType::class, 'category_id');
     }
}
