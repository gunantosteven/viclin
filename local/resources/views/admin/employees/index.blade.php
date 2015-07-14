@extends('/admin/app')

@section('content')
<h1>Viclin Employees</h1>
 <a href="{{url('admin/employees/create')}}" class="btn btn-success">Create Employees</a>
 <hr>
 {!! Form::open(['method' => 'GET', 'route'=>['admin.employees.index']]) !!}
 {!! Form::text('search',null,['class'=>'pull-right']) !!}
 {!! Form::label('search', 'Search Name or Address :&nbsp;',['class'=>'pull-right']) !!}
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
         <th>Since</th>
         <th>Status</th>
         <th colspan="2">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($employees as $employee)
         <tr>
             <td>{{ $employee->namaemp }}</td>
             <td>{{ $employee->alamatemp }}</td>
             <td>{{ $employee->telpemp }}</td>
             <td>{{ $employee->kotaemp }}</td>
             <td>{{ $employee->tglmasuk }}</td>
             <td>{{ $employee->status }}</td>
             <td><a href="{{route('admin.employees.edit',$employee->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.employees.destroy', $employee->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
 <div class="pagination"> {!! str_replace('/?', '?', $employees->render()); $employees->render(); !!} </div>
    </div>
</div>
@endsection
