<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =['title', 'auther', 'description', 'category_id', 'image', 'file'];
}
