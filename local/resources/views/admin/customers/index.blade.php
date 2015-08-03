@extends('/admin/app')

@section('content')
<h1>Viclin Customers</h1>
 <a href="{{url('admin/customers/create')}}" class="btn btn-success">Create Customers</a>
 <hr>
 {!! Form::open(['method' => 'GET', 'route'=>['admin.customers.index']]) !!}
 {!! Form::text('search',null,['class'=>'pull-right']) !!}
 {!! Form::label('search', 'Search NIK or Address :&nbsp;',['class'=>'pull-right']) !!}
 {!! Form::close() !!}
 </br>
 </br>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Company</th>
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
             <td>{{ $customer->company }}</td>
             <td>{{ $customer->namacust }}</td>
             <td>{{ $customer->alamatcust }}</td>
             <td>{{ $customer->telpcust }}</td>
             <td>{{ $customer->kotacust }}</td>
             <td>{{ $customer->emailcust }}</td>
             <td><a href="{{route('admin.customers.edit',$customer->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.customers.destroy', $customer->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
 <div class="pagination"> {!! str_replace('/?', '?', $customers->render()); $customers->render(); !!} </div>
    </div>
</div>

@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection
