<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'author_id',
        'page_nb',
        'price',
        'cover_img',
        'publish_date',
        'publisher',
        'language',
        'type',
        'dimensions',
        'stock_qty',
        'size',
        'format',
        'file_path'
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
