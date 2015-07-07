@extends('/owner/app')

@section('content')
<h1>Viclin Suppliers</h1>
<a href="{{url('owner/suppliers/create')}}" class="btn btn-success">Create Suppliers</a>
<hr>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>IDSupplier</th>
     <th>Name</th>
     <th>Address</th>
     <th>Phone</th>
     <th>City</th>
     <th>Email</th>
     <th colspan="3">Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($suppliers as $supplier)
     <tr>
         <td>{{ $supplier->niksupp }}</td>
         <td>{{ $supplier->namasupp }}</td>
         <td>{{ $supplier->alamatsupp }}</td>
         <td>{{ $supplier->telpsupp }}</td>
         <td>{{ $supplier->kotasupp }}</td>
         <td>{{ $supplier->emailsupp }}</td>
         <td><a href="{{url('owner/suppliers',$supplier->id)}}" class="btn btn-primary">Read</a></td>
         <td><a href="{{route('owner.suppliers.edit',$supplier->id)}}" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.suppliers.destroy', $supplier->id]]) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
@endforeach
 </tbody>

</table>
@endsection
