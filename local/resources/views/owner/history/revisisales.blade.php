@extends('/owner/app')

@section('content')
<h1>History Revision Sales Invoice</h1>
<hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Revision Date</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['owner.history.revisisales.showfaktur']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Start Date :</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">End Date :</div>
                    <div class="span9">{!! Form::input('date','tanggalakhir',$tanggalakhir,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>User</th>
         <th>Revision Date</th>
         <th>Sales / Purchase</th>
         <th>First Data</th>
         <th>Last Data</th>
         <th>Information</th>
         <th></th>
     </tr>
     </thead>
     <tbody>
        @if($revisis != null)
            @foreach ($revisis as $key => $revisi)
                <tr>
                     <td>{{ DB::table('users')->where('id', '=', $revisi['user'])->first()->namauser }}</td>
                     <td>{{ date("d F Y",strtotime($revisi['tglrevisi'])) }}</td>
                     <td>{{ $revisi['jualbeli'] }}</td>
                     <td>{{ $revisi['dataawal'] }}</td>
                     <td>{{ $revisi['dataakhir'] }}</td>
                     <td>{{ $revisi['keterangan'] }}</td>
                     <td><a href="{{route('owner.history.revisisales.read',$revisi['id'])}}" class="btn btn-warning">OK</a></td>
                </tr>
            @endforeach
        @endif
        </td>

     </tbody>


 </table>
@endsection