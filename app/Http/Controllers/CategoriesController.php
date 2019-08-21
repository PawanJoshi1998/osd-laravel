<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Book;

class CategoriesController extends Controller
{
    public function index(){
        
        $categories = Category::all();
        return view('categories.index',compact('categories',$categories));
    }


    public function create(){
        return view('categories.create');
    }

    // yo "show" function le view category ko index ma click garda sabai Book ko detail dinxa
    public function show($category){
        
        $books = Book::where('category_id',$category)->get();
        // dd($category);
        return view('books.index',compact('books'));

    }

    public function store(Request $request){
      

        $input = $request->all();
        Category::create($input);
        return redirect(url('categories'));
    }


    public function edit($category){

        $category = Category::find($category);
        return view('categories.edit',compact('category'));
        Route::get('categories/{category}', 'CategoriesController@show');
    }
    public function update(Request $request, $category){

        $category = Category::find($category);
        $category->name = $request->get('name');
        $category->category = $request->get('category');

        $category->save();
        return redirect(url('categories'));

        // dd($request->all());

    }

    public function destroy($category){
    
        $category = Category::find($category);
        $category->delete();
        return redirect(url('categories'));
    }

    
}
