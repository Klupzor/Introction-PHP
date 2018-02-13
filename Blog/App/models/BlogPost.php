<?php

namespace App\models;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model {
  protected $table = 'blog_post';
  protected $fillable = ['title','content', 'img_url'];
}

 
