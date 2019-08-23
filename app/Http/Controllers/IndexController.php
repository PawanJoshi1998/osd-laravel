<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class IndexController extends Controller
{
    public function index()
    {

        $books = Book::take(4)->get();
        
    	
    	return view('index', compact('books', 'categories'));
    }


    public function show($category){

    $books = Book::where('category_id', $category)->get();
    // $categories = Category::all();
    return view('books.index', compact('bookss'));

    }
}
