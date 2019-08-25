@extends('layouts.app')
@section('content')
<div class="container">
<form action="{{url('bannerss')}}" method="POST" enctype="multipart/form-data">
	@csrf
	<h1>Edit Banner Content </h1>
	
	<div class="form-group">
		<label for="heading">Heading</label>
		<input type="text" class="form-control" name="heading" value="{{old('heading')}}">
	    </div>

        <div class="form-group">
		<label for="description">Description</label>
		<input type="text" class="form-control" name="description" value="{{old('discription')}}">
		</div>

	    <div>
		<label for="image">Image</label>
		<input type="file" class="form-control" name="image" value="{{old('image')}}">
	    </div>

		<div class="form-group">
		<input type="Submit" class="btn btn-primary" value="Save">
	    </div>
</form>
</div>
@endsection
