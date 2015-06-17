@extends('/admin/app')

@section('content')
<h1>Viclin Customers</h1>
 <a href="{{url('admin/customers/create')}}" class="btn btn-success">Create Customers</a>
 <hr>
 {!! Form::open(['method' => 'GET', 'route'=>['admin.customers.index']]) !!}
 {!! Form::text('search',null,['class'=>'pull-right']) !!}
 {!! Form::label('search', 'Search NIK or Name :&nbsp;',['class'=>'pull-right']) !!}
 {!! Form::close() !!}
 </br>
 </br>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
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
 <div class="pagination"> {!! str_replace('/?', '?', $customers->render()); $customers->render(); !!} </div>
    </div>
</div>
@endsection
