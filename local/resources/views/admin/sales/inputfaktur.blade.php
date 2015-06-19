@extends('/admin/app')

@section('content')
<h1>Input Faktur Penjualan</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Kode Barang</th>
         <th>Harga Jual</th>
         <th>Jumlah Kg</th>
         <th>Status</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
     @if (Session::has('salesitems')) 
        @foreach (Session::get('salesitems') as $key => $item)

        <tr>
             <td>{{ $item['kodebrg'] }}</td>
             <td>{{ $item['hargajual'] }}</td>
             <td>{{ $item['jumlahkg'] }}</td>
             <td>{{ $item['status'] }}</td>
             <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailinputfaktur.destroy', $item['id'] ]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
             </td>
        </tr>

        @endforeach
        </td>
     @endif
     </tbody>


 </table>
 @if (Session::has('salesitems') && count(Session::get('salesitems')) > 0) 
     {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailinputfaktur.destroy', -1 ]]) !!}
     {!! Form::submit('Delete All', ['class' => 'btn btn-danger pull-right']) !!}
     {!! Form::close() !!}
 @endif
 <br>

<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Item</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/sales/detailinputfaktur']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Kode Barang:</div>
                <div class="span9">{!! Form::text('kodebrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Harga Jual:</div>
                <div class="span9">{!! Form::textarea('hargajual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Jumlah Kg:</div>
                <div class="span9">{!! Form::text('jumlahkg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Status:</div>
                <div class="span9">
                    {!! Form::select('status', [
                       'Live Food' => 'Live Food',
                       'Frozen Food' => 'Frozen Food'],null,['class'=>'']
                    ) !!}
                </div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Add Item', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

 
 <hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Faktur</h1>
        </div>

        {!! Form::open(['url' => 'admin/sales/inputfaktur']) !!}
        <div class="block-fluid"> 
            
            <div class="row-form clearfix">
                <div class="span3">No Faktur:</div>
                <div class="span9">{!! Form::text('nojual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Customer:</div>
                <div class="span9">{!! Form::text('customer',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Order:</div>
                <div class="span9">{!! Form::input('date','tanggalorder',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Jatuh Tempo:</div>
                <div class="span9">{!! Form::input('date','tanggaljatuhtempo',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Biaya Ekspedisi:</div>
                <div class="span9">{!! Form::text('biayaekspedisi',null,['class'=>'']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Biaya Steroform:</div>
                <div class="span9">{!! Form::text('biayasteroform',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kurs Rupiah Terbaru:</div>
                <div class="span9">{!! Form::text('kursterbaru',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection