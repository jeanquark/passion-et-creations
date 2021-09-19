<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * Get the comments for the blog post.
     */
    public function slider_images()
    {
        // return $this->hasMany(SliderImage::class);
        return $this->hasMany(SliderImage::class)->orderBy('order', 'ASC');
    }
}
