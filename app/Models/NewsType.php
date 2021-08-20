<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class NewsType extends Model
{
    use HasFactory;
    protected $fillable= [
        'name',
        'category_id'
    ];
    /**
     * Get the user that owns the NewsType
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
