<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    use HasFactory;

    /**
     * Get the post that owns the comment.
     */
    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    
}
