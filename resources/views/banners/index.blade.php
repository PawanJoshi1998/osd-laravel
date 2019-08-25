@extends('layouts.app')
@section('content')

    @if(session('status'))
    <p class = "alert alert-success">
        {{ session('status') }}
    </p>
    @endif
<div class="container">
    <h3>
    <a href ="{{url('banners/create')}}">Create Banner</a>
    </h3>
    <table border="1" class="table table-striped">

    <thead  style="background-color:grey; font-size:18px;">
    <tr>
    <th>id</th>
    <th>Heading</th>
    <th>Description</th>
    <th>Book Img</th>>
    <th>Action</th>
    </tr>
    </thead>


    <tbody style="font-size:18px;">

    <?php foreach($banners as $banner){?>
    <tr>
    <td> <?php echo $banner->id;?></td>
    <td> <?php echo $banner->heading;?></a></td>
    <td> <?php echo $banner->description;?></td>
    <td><img src="{{asset('storage/images/banners/'. $banner->image)}}" alt="" height="100" width="150"></td>
    <td>
    <div class="row">
    <div class="col-md-4">

    <a href=" {{url('banners/' .$banner->id. '/edit')}}" button type="button" class="btn btn-info a">Edit</a></button>

    </div>
    <div class="col-md-4">
    <form action="{{url('banners/'.$banner->id)}}" method="POST">
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
