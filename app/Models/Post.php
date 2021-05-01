<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'post_title_en',
        'post_title_in',
        'post_image',
        'details_en',
        'details_in',
    ];

    public function postcategory(){
    	return $this->belongsTo(PostCategory::class,'category_id','id');
    }
}
