@extends('/owner/app')

@section('content')
<h1>Viclin Items</h1>
<a href="{{url('owner/items/create')}}" class="btn btn-success">Create Item</a>
<hr>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>Code</th>
     <th>Category</th>
     <th>Name</th>
     <th>StockKG</th>
     <th>Status</th>
     <th>StockTail</th>
     <th colspan="2">Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($items as $item)
     <tr>
         <td>{{ $item->kodebrg }}</td>
         <td>{{ DB::table('categories')->where('id', $item->id_category)->first()->namakategori }}</td>
         <td>{{ $item->namabrg }}</td>
         <td>{{ $item->stokkg }}</td>
         <td>{{ $item->status }}</td>
         <td>{{ $item->stokbrg }}</td>
         <td><a href="{{route('owner.items.edit',$item->id)}}" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.items.destroy', $item->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
 @endforeach

 </tbody>

</table>

@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection
