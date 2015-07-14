@extends('/admin/app')

@section('content')
<h1>Viclin Salary</h1>
 <a href="{{url('admin/salaries/create')}}" class="btn btn-success">Create Salary</a>
 <hr>
 </br>
 </br>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Employee</th>
         <th>Transaction Date</th>
         <th>Month</th>
         <th>Year</th>
         <th>Information</th>
         <th>Nominal</th>
         <th colspan="2">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($salaries as $salary)
         <tr>
             <td>{{ DB::table('employees')->where('id', $salary->idemp)->first()->namaemp }}</td>
             <td>{{ date("d F Y",strtotime($salary->tgltransaksi)) }}</td>
             <td>{{ $salary->bulan }}</td>
             <td>{{ $salary->tahun }}</td>
             <td>{{ $salary->keterangan }}</td>
             <td>{{ number_format($salary->nominal, 2) }}</td>
             <td><a href="{{route('admin.salaries.edit',$salary->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.salaries.destroy', $salary->id], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

 <div class="pagination"> {!! str_replace('/?', '?', $salaries->render()); $salaries->render(); !!} </div>
    </div>
</div>
@endsection
