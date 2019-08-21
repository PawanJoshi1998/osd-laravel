@extends('layouts.app')
@section('content')

<div class="container">
<h3><a href ="{{url('categories/create')}}">Create Categories</a></h3>


<table border="1" class="table table-striped" >

<thead  style="background-color:grey; font-size:18px;">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Category</th>
    <th>Action</th>
</tr>
</thead>


<tbody style="font-size:18px;">

<?php foreach($categories as $category){?>
    <tr>
<td> <?php echo $category->id;?></td>
<td> <a href="{{url('categories/'.$category->id)}}"><?php echo $category->name;?></a></td>
<td> <?php echo $category->category;?></td>
<td>
<div class="row">
<div class="col-md-3">

<!-- this $class->id ko $class bhaneko mathi ko foreach ko $class ho -->
 <a href=" {{url('categories/' .$category->id. '/edit')}}" button type="button" class="btn btn-info a">Edit</a></button>

</div>
<div class="col-md-9">
<!-- same goes in delete ma pani $class->id ko $class mathi ko foreach ko $class nai use ho -->
<form action="{{url('categories/'.$category->id)}}" method="POST">
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
