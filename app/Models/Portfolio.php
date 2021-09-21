<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'front_image_id', 'name', 'description', 'order', 'is_active'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post that owns the comment.
     */
    public function front_image()
    {
        return $this->belongsTo(PortfolioImage::class);
    }

    /**
     * The roles that belong to the user.
     */
    // public function images()
    // {
    //     return $this->belongsToMany('App\Models\Image', 'portfolio_image', 'portfolio_id', 'image_id')->withTimestamps();
    // }

    /**
     * Get the comments for the blog post.
     */
    public function portfolio_images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
