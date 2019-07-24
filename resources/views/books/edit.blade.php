@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('books/' .$book->id)}}" method="POST" enctype="multipart/form-data">
	@csrf
	<h1>Edit New Books </h1>
	
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


	    <div>
		<label for="image">Image</label>
		<input type="file" name="image">
	    </div>

		<div class="form-group">
		<input type="Submit" class="btn btn-primary" value="Save">
	    </div>
</form>
</div>
@endsection
