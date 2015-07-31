@extends('/owner/app')

@section('content')
<h1>Viclin Categories</h1>
<a href="{{url('owner/categories/create')}}" class="btn btn-success">Create Category</a>
<hr>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>Code</th>
     <th>Name</th>
     <th colspan="2">Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($categories as $category)
     <tr>
         <td>{{ $category->kodekategori }}</td>
         <td>{{ $category->namakategori }}</td>
         <td><a href="{{route('owner.categories.edit',$category->id)}}" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.categories.destroy', $category->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
 @endforeach

 </tbody>

</table>
@endsection
