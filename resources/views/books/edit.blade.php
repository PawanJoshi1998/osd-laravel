@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('books/' .$book->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	<h1>Edit New Books </h1>
	
	    <div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" value="<?php echo $book->title;?>">
	    </div>
	
		<div class="form-group">
		<label for="auther">Auther</label>
		<input type="text" class="form-control" name="auther" value="<?php echo $book->auther;?>">
	    </div>

        <div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" name="description" value="<?php echo $book->description;?>">
		</div>

		<div class="form-group">
		<label for="category_id">Category</label>
		<select name="category_id" id="">
			@foreach($categories as $category)
			<option value="<?php echo $book->category_id;?>">
			 {{$category->name}}</option>
			@endforeach
		</select>
		</div>	

	    <div>
		<label for="image">Image</label>
		<input type="file" class="form-control" name="image" value="{{old('image')}}">
	    </div>

		<div>
		<label for="file">PDF</label>
		<input type="file" class="form-control" name="file" value="{{old('file')}}">
	    </div>

		<div class="form-group">
		<input type="Submit" class="btn btn-primary" value="Save">
	    </div>
</form>
</div>
@endsection
