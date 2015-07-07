@extends('/admin/app')

@section('content')
<h1>Revision Sales Invoice</h1>
<hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Faktur</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['admin.sales.revisifaktur.showfaktur']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Start Date Invoice :</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">End Date Invoice:</div>
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
         <th>No Invoice</th>
         <th>Customer</th>
         <th>Order Date</th>
         <th>Due Date</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
        @if($juals != null)
            @foreach ($juals as $key => $jual)
                <tr>
                     <td>{{ $jual['nojual'] }}</td>
                     <td>{{ DB::table('customers')->where('id', $jual['nikcust'])->first()->namacust }}</td>
                     <td>{{ $jual['tglorderjual'] }}</td>
                     <td>{{ $jual['tgltempojual'] }}</td>
                     <td><a href="{{url('admin/sales/revisifaktur',$jual->nojual)}}" class="btn">Revisi</a></td>
                </tr>
            @endforeach
        @endif
        </td>

     </tbody>


 </table>
@endsection