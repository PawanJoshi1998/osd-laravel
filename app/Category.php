<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\Book;

class Category extends Model
{
    protected $fillable =['name', 'category'];
    protected $table = 'categories';

    public function books(){

        return $this->hasMany(Book::class);
    }

}
