<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Book;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request $request){

        // Function to create new book. 

        $book = new Book();
        $book->title = $request["title"];
        $book->auther = $request["auther"];
        $book->description = $request["description"];
        $book->image = $request["image"];

        // Do some validation here.

        

       
       // Upload the file and save book to db. 
       if($request->hasFile('image')){
    
           $destination_path = 'public/images/books';
           $image = $request->file('image');
           $image_name= time(). '_' . $image->getClientOriginalName();

           $request->file('image')->storeAs($destination_path, $image_name);
           $book->image = $image_name;
        }
        
        // Finally save the book.
        $book->save();







  
        return redirect(url('books'));
    }

    public function edit($book){
        
        $book = Book::find($book);       
        return view('books.edit')->with('book', $book);

    }
    public function update(Request $request, $book){

        $book = Book::find($book);
        $book->title = $request->get('title');
        $book->auther = $request->get('auther');
        $book->description = $request->get('description');
        if($request->hasFile('image'))

            {
            $userImage = public_path("storage/images/books/{$book->image}");

            // if(File::exist($userImage))
            // {
            //     File::delete($userImage);
            // }

            $destination_path='public/images/books';
            $image = $request->file('image');
            $image_name= time(). '_' . $image->getClientOriginalName();

            $request->file('image')->storeAs($destination_path, $image_name);
                
            }
        

        $book->save();
        return redirect(url('books'));

        // dd($request->all());

    }

    public function destroy($book){

        $book = Book::find($book);
        $book->delete();
        return redirect(url('books'));
    }
}
