<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'status',
        'price',
    ];


    /**
     * Get the author for the book.
     */
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }

    /**
    * status with badge
    *
    * @return String
    */
    public function getStatusBadgeAttribute()
    {
        if ($this->status === 'preorder') {
            return '<span class="mt-1 badge rounded-pill bg-warning">preorder</span>';
        }

        return '<span class="mt-1 badge rounded-pill bg-success">available</span>';
    }
}
