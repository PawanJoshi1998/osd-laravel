@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('books')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<h1>Create New Books </h1>
	
	    <div class="form-group">
		<label for="title">Title</label>
		<input type="text" class="form-control" name="title" value="{{old('title')}}">
	    </div>
		
		<div class="form-group">
		<label for="auther">Auther</label>
		<input type="text" class="form-control" name="auther" value="{{old('auther')}}">
	    </div>

        <div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" name="description" value="{{old('discription')}}">
		</div>

		<div class="form-group">
		<label for="category_id">Category</label>
		<select name="category_id" id="">
			@foreach($categories as $category)
			<option value="{{$category->id}}">
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
