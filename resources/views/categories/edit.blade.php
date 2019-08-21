@extends('layouts.app')
@section('content')

<div class="container">
<form action="{{url('categories/'.$category->id)}}" method ="POST"  >
<h2>Edit Categories</h2>
    @csrf
    @method('patch')

	<div class="form-group" style="font-size:18px;"> <!-- Name field -->
		<label class="control-label " for="name">Name</label>
		<input class="form-control" id="name" name="name" value="<?php echo $category->name;?>" type="text" required style="font-size:19px;"/>
	</div>

	<div class="form-group" style="font-size:18px;"> <!-- Description field -->
		<label class="control-label requiredField" for="category">Category</label>
		<input class="form-control" id="category" name="category" value="<?php echo $category->category;?>" type="number" required style="font-size:19px;"/>
	</div>

	<div class="form-group">
		<button class="btn btn-primary " name="save" type="submit" value="save">Save</button>
	</div>

</form>
</div>
@endsection
