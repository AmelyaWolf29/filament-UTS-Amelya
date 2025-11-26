<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pages';
    protected $fillable = [
        'title', 'slug', 'content', 'featured_image',
        'meta_title', 'meta_description', 'meta_keywords', 'is_published', 
        'published_at', 'created_by', 'updated_by',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function createdBy() {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updatedBy() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
