<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MoviePage extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'link',
        'img'
    ];

    public function category()
    {
        //Жанр фильма
        return $this->belongsTo(MovieCategory::class);
    }
}
