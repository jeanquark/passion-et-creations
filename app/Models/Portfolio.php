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
        'category_id', 'title', 'description', 'order', 'is_active'
    ];

    /**
     * Get the category that owns the portfolio.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images for the portfolio.
     */
    public function portfolio_images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
