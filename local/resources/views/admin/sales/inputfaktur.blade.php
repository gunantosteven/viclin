@extends('/admin/app')

@section('content')
<h1>Input Faktur Penjualan</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Nama Barang</th>
         <th>Harga Satuan Kg</th>
         <th>Jumlah Kg</th>
         <th>Jumlah Ekor</th>
         <th>Keterangan</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
     @if (Session::has('salesitems')) 
        @foreach (Session::get('salesitems') as $key => $item)

        <tr>
             <td>{{  DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
             <td>{{ $item['hargasatuankg'] }}</td>
             <td>{{ $item['jumlahkg'] }}</td>
             <td>{{ $item['jumlahekor'] }}</td>
             <td>{{ $item['keterangan'] }}</td>
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
                <div class="span3">Nama Barang:</div>
                <div class="span9">
                    <select name="kodebrg" id="s2_1item" style="width: 100%;">
                        @foreach ($items as $key => $item)
                            <option value={{ $item['kodebrg'] }}>{{ $item['namabrg'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Harga Satuan Kg:</div>
                <div class="span9">{!! Form::text('hargasatuankg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Jumlah Kg:</div>
                <div class="span9">{!! Form::text('jumlahkg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Jumlah Ekor:</div>
                <div class="span9">{!! Form::text('jumlahekor',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Keterangan:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
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
                <div class="span3">Customer:</div>
                <div class="span9">
                    <select name="idcust" id="s2_1customer" style="width: 100%;">
                        @foreach ($customers as $key => $item)
                            <option value={{ $item['id'] }}>{{ $item['namacust'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Order:</div>
                <div class="span9">{!! Form::input('date','tglorderjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Jatuh Tempo:</div>
                <div class="span9">{!! Form::input('date','tgltempojual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Biaya Ekspedisi:</div>
                <div class="span9">{!! Form::text('biayaekspjual',null,['class'=>'']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Biaya Steroform:</div>
                <div class="span9">{!! Form::text('biayastereo',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kurs Rupiah Terbaru:</div>
                <div class="span9">{!! Form::text('kursbaru',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker();
</script>
@endsection