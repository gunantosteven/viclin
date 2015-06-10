@extends('/admin/app')

@section('content')
<div class="container">
<h1>Viclin Customers</h1>
 <a href="{{url('admin/customers/create')}}" class="btn btn-success">Create Customers</a>
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
         <th>Limit</th>
         <th colspan="3">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($customers as $customer)
         <tr>
             <td>{{ $customer->nikcust }}</td>
             <td>{{ $customer->namacust }}</td>
             <td>{{ $customer->alamatcust }}</td>
             <td>{{ $customer->telpcust }}</td>
             <td>{{ $customer->kotacust }}</td>
             <td>{{ $customer->emailcust }}</td>
             <td>{{ $customer->limitcust }}</td>
             <td><a href="{{url('admin/customers',$customer->id)}}" class="btn btn-primary">Read</a></td>
             <td><a href="{{route('admin.customers.edit',$customer->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.customers.destroy', $customer->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
</div>
@endsection
