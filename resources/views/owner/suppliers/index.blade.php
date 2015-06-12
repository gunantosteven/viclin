@extends('/owner/app')

@section('content')
<div class="container">
<h1>Viclin Suppliers</h1>
 <a href="{{url('owner/suppliers/create')}}" class="btn btn-success">Create Suppliers</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>NIK</th>
         <th>Nama</th>
         <th>Alamat</th>
         <th>Telepon</th>
         <th>Kota</th>
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
</div>
@endsection
