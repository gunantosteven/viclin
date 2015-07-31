@extends('/owner/app')

@section('content')
<h1>Viclin Customers</h1>
<a href="{{url('owner/customers/create')}}" class="btn btn-success">Create Customers</a>
<hr>
{!! Form::open(['method' => 'GET', 'route'=>['owner.customers.index']]) !!}
{!! Form::text('search',null,['class'=>'pull-right']) !!}
{!! Form::label('search', 'Search NIK or Alamat :&nbsp;',['class'=>'pull-right']) !!}
{!! Form::close() !!}
</br>
</br>
<table class="table table-striped table-bordered table-hover">
 <thead>
 <tr class="bg-info">
     <th>Name</th>
     <th>Address</th>
     <th>Phone</th>
     <th>City</th>
     <th>Email</th>
     <th colspan="2">Actions</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($customers as $customer)
     <tr>
         <td>{{ $customer->namacust }}</td>
         <td>{{ $customer->alamatcust }}</td>
         <td>{{ $customer->telpcust }}</td>
         <td>{{ $customer->kotacust }}</td>
         <td>{{ $customer->emailcust }}</td>
         <td><a href="{{route('owner.customers.edit',$customer->id)}}" class="btn btn-warning">Update</a></td>
         <td>
         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.customers.destroy', $customer->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
         {!! Form::close() !!}
         </td>
     </tr>
 @endforeach

 </tbody>

</table>
<div class="pagination"> {!! str_replace('/?', '?', $customers->render()); $customers->render(); !!} </div>
@endsection
