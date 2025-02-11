@extends('/owner/app')

@section('content')
<h1>Viclin Suppliers</h1>
<a href="{{url('owner/suppliers/create')}}" class="btn btn-success">Create Suppliers</a>
<hr>
{!! Form::open(['method' => 'GET', 'route'=>['owner.suppliers.index']]) !!}
{!! Form::text('search',null,['class'=>'pull-right']) !!}
{!! Form::label('search', 'Search Name or Address :&nbsp;',['class'=>'pull-right']) !!}
{!! Form::close() !!}
</br>
</br>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>IDSupplier</th>
     <th>Name</th>
     <th>Address</th>
     <th>Phone</th>
     <th>City</th>
     <th>Email</th>
     <th colspan="2">Actions</th>
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
         <td><a href="{{route('owner.suppliers.edit',$supplier->id)}}" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.suppliers.destroy', $supplier->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
@endforeach
 </tbody>

</table>
<div class="pagination"> {!! str_replace('/?', '?', $suppliers->render()); $suppliers->render(); !!} </div>

@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection
