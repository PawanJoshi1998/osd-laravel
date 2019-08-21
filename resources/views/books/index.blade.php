@extends('layouts.app')
@section('content')

    @if(session('status'))
    <p class = "alert alert-success">
        {{ session('status') }}
    </p>
    @endif
<div class="container">
    <h3>
    <a href ="{{url('books/create')}}">Create Book</a>
    </h3>


    <table border="1" class="table table-striped" >

    <thead  style="background-color:grey; font-size:18px;">
    <tr>
    <th>id</th>
    <th>Title</th>
    <th>Auther</th>
    <th>Description</th>
    <th>Category_id</th>
    <th>Book Img</th>
    <th>PDF File</th>
    <th>Aaction</th>
    </tr>
    </thead>


    <tbody style="font-size:18px;">

    <?php foreach($books as $book){?>
    <tr>
    <td> <?php echo $book->id;?></td>
    <td> <?php echo $book->title;?></a></td>
    <td> <?php echo $book->auther;?></td>
    <td> <?php echo $book->description;?></td>
    <td> <?php echo $book->category_id;?></td>
    <td><img src="{{asset('storage/images/books/'. $book->image)}}" alt="" height="100" width="150"></td>
    <td><img src="{{asset('storage/files/pdf/'. $book->file)}}" alt="" height="100" width="150"></td>
    <td>
    <div class="row">
    <div class="col-md-4">

    <a href=" {{url('books/' .$book->id. '/edit')}}" button type="button" class="btn btn-info a">Edit</a></button>

    </div>
    <div class="col-md-4">
    <form action="{{url('books/'.$book->id)}}" method="POST">
    @csrf
    @method('delete')

    <button type="submit" class="btn btn-danger">Delete</button>
    </form>

    </div>

    </div>
    </div>
    </td>
    <?php }?>

</table>
</div>
@endsection
