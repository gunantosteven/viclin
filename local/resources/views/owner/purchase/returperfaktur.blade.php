@extends('/owner/app')

@section('content')
<h1>Retur Per Faktur Pembelian</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Kode Barang</th>
         <th>Harga Beli</th>
         <th>Jumlah Kg</th>
         <th>Status</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
     @if (Session::has('purchaseitems')) 
        @foreach (Session::get('purchaseitems') as $key => $item)

        <tr>
             <td>{{ $item['kodebrg'] }}</td>
             <td>{{ $item['hargabeli'] }}</td>
             <td>{{ $item['jumlahkg'] }}</td>
             <td>{{ $item['status'] }}</td>
             <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', $item['id'] ]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
             </td>
        </tr>

        @endforeach
        </td>
     @endif
     </tbody>


 </table>
 @if (Session::has('purchaseitems') && count(Session::get('purchaseitems')) > 0) 
     {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', -1 ]]) !!}
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
        
        {!! Form::open(['url' => 'owner/purchase/detailinputfaktur']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Kode Barang:</div>
                <div class="span9">{!! Form::text('kodebrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Harga Beli:</div>
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

        {!! Form::open(['url' => 'owner/purchase/inputfaktur']) !!}
        <div class="block-fluid"> 
            
            <div class="row-form clearfix">
                <div class="span3">No Retur:</div>
                <div class="span9">{!! Form::text('noreturbeli',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">No Faktur Beli:</div>
                <div class="span9">{!! Form::text('nobeli',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Retur Beli:</div>
                <div class="span9">{!! Form::input('date','tglreturbeli',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Retur', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection