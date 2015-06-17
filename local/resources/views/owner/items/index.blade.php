@extends('/owner/app')

@section('content')
<h1>Viclin Products</h1>
<a href="{{url('owner/items/create')}}" class="btn btn-success">Create Product</a>
<hr>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>Kode</th>
     <th>Category</th>
     <th>Nama</th>
     <th>StockKG</th>
     <th>Status</th>
     <th>StockBrg</th>
     <th colspan="3">Actions</th>
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
         <td><a href="{{url('owner/items',$item->id)}}" class="btn btn-primary">Read</a></td>
         <td><a href="#" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.items.destroy', $item->id]]) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
 @endforeach

 </tbody>

</table>
@endsection
