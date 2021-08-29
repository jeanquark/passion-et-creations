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
    // protected $fillable = [
    //     'name', 'slug', 'image', 'contribution', 'start_date', 'end_date', 'is_partner', 'is_supporter', 'is_active'
    // ];

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
        return $this->belongsTo(Image::class);
    }

    /**
     * The roles that belong to the user.
     */
    public function images()
    {
        // return $this->belongsToMany(Image::class);
        return $this->belongsToMany('App\Models\Image', 'portfolio_image', 'portfolio_id', 'image_id')->withTimestamps();
    }
}
