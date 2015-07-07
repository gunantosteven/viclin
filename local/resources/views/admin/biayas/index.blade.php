@extends('/admin/app')

@section('content')
<h1>Viclin Cost</h1>
 <a href="{{url('admin/biayas/create')}}" class="btn btn-success">Create Cost</a>
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
     @foreach ($biayas as $biaya)
         <tr>
             <td>{{ $biaya->biaya }}</td>
             <td>{{ $biaya->tgl }}</td>
             <td>{{ $biaya->keterangan }}</td>
             <td>{{ $biaya->nominal }}</td>
             <td><a href="{{route('admin.biayas.edit',$biaya->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['admin.biayas.destroy', $biaya->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>

 <div class="pagination"> {!! str_replace('/?', '?', $biayas->render()); $biayas->render(); !!} </div>
    </div>
</div>
@endsection
