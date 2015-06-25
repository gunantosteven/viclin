@extends('/admin/app')

@section('content')
<h1>Cetak Faktur Penjualan</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Faktur</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['admin.sales.cetakfaktur.showfaktur']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Awal Faktur :</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Akhir Faktur:</div>
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
         <th>No Faktur</th>
         <th>Customer</th>
         <th>Tanggal Order</th>
         <th>Tanggal Jatuh Tempo</th>
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
                     <td><a href="{{url('admin/sales/cetakfaktur',$jual->nojual)}}" class="btn" target="_blank">Cetak</a></td>
                </tr>
            @endforeach
        @endif
        </td>

     </tbody>


 </table>
@endsection