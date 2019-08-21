<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Book;
use App\Category;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(){

        $categories = Category::all();
        return view('books.create')->with('categories',$categories);
    }

    public function store(Request $request){

        // Function to create new book. 
        // print_r($_POST);
        // die();
        $book = new Book();
        $book->title = $request["title"];
        $book->auther = $request["auther"];
        $book->description = $request["description"];
        $book->category_id = $request['category_id'];
        $book->image = $request["image"];
        $book->file = $request["file"];

        // Do some validation here.

        

       
       // Upload the image
       if($request->hasFile('image')){
    
           $destination_path = 'public/images/books';
           $image = $request->file('image');
           $image_name= time(). '_' . $image->getClientOriginalName();

           $request->file('image')->storeAs($destination_path, $image_name);
           $book->image = $image_name;
        }
        
        //upload pdf

        if($request->hasFile('file')){
    
            $destination_path = 'public/files/books';
            $file = $request->file('file');
            $file_name= time(). '_' . $file->getClientOriginalName();
 
            $request->file('file')->storeAs($destination_path, $file_name);
            $book->file = $file_name;
         }
         
         
        // Finally save the book.
        $book->save();

        return redirect(url('books'));
    }

    public function edit($book){
        
        $book = Book::find($book);  
        $categories = Category::all();     
        // print_r($_POST);
        // die();
        return view('books.edit')->with(['book' => $book, 'categories' => $categories
        ]);

    }
    public function update(Request $request, $book){

        $book = Book::find($book);
        $book->title = $request->get('title');
        $book->auther = $request->get('auther');
        $book->description = $request->get('description');
        $book->category_id =$request->get('category_id');
        if($request->hasFile('image')){
    
            $destination_path = 'public/images/books';
            $image = $request->file('image');
            $image_name= time(). '_' . $image->getClientOriginalName();
 
            $request->file('image')->storeAs($destination_path, $image_name);
            $book->image = $image_name;
         }

         if($request->hasFile('file')){
    
            $destination_path = 'public/files/books';
            $file = $request->file('file');
            $file_name= time(). '_' . $file->getClientOriginalName();
            $request->file('file')->storeAs($destination_path, $file_name);
            $book->file = $file_name;
         }


        $book->save();
        return redirect(url('books'));

        // dd($request->all());

    }

    public function destroy($book){

        $book = Book::find($book);
        $book->delete();
        return redirect(url('books'))->with('status','Deleted Successfully');
    }
}
