@extends('/admin/app')

@section('content')
<h1>Viclin Cost</h1>
 <a href="{{url('admin/costs/create')}}" class="btn btn-success">Create Cost</a>
 <hr>
 </br>
 </br>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Cost</th>
         <th>Date</th>
         <th>Information</th>
         <th>Nominal</th>
         <th colspan="2">Actions</th>
     </tr>
     </thead>
     <tbody>
     @foreach ($costs as $cost)
         <tr>
             <td>{{ $cost->biaya }}</td>
             <td>{{ date("d F Y",strtotime($cost->tgl)) }}</td>
             <td>{{ $cost->keterangan }}</td>
             <td>{{ $cost->nominal }}</td>
             <td><a href="{{route('admin.costs.edit',$cost->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.costs.destroy', $cost->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

 <div class="pagination"> {!! str_replace('/?', '?', $costs->render()); $costs->render(); !!} </div>
    </div>
</div>
@endsection
