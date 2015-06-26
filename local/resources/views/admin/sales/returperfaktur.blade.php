@extends('/admin/app')

@section('content')
<h1>Retur Per Faktur Penjualan</h1>
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>Nama Barang</th>
         <th>Harga Satuan Kg</th>
         <th>Jumlah Kg</th>
         <th>Jumlah Ekor</th>
         <th>News Retur Jual</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
     @if (Session::has('retursalesitems')) 
        @foreach (Session::get('retursalesitems') as $key => $item)
        <tr>
             <td>{{  DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
             <td>{{ $item['hargasatuankgretjual'] }}</td>
             <td>{{ $item['jumlahkgretjual'] }}</td>
             <td>{{ $item['jumlahekorretjual'] }}</td>
             <td>{{ $item['newsretjual'] }}</td>
             <td>
                {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailreturfaktur.destroy', $item['id'] ]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
             </td>
        </tr>
        @endforeach
        </td>
     @endif
     </tbody>


 </table>
 @if (Session::has('retursalesitems') && count(Session::get('retursalesitems')) > 0) 
     {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailreturfaktur.destroy', -1 ]]) !!}
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
        
        {!! Form::open(['url' => 'admin/sales/detailreturfaktur']) !!}
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
                <div class="span9">{!! Form::text('hargasatuankgretjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Jumlah Kg:</div>
                <div class="span9">{!! Form::text('jumlahkgretjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Jumlah Ekor:</div>
                <div class="span9">{!! Form::text('jumlahekorretjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">News:</div>
                <div class="span9">{!! Form::textarea('newsretjual',null,['class'=>'']) !!}</div>
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
            <h1>Insert Retur Faktur</h1>
        </div>

        {!! Form::open(['url' => 'admin/sales/returperfaktur']) !!}
        <div class="block-fluid"> 
        	<div class="row-form clearfix">
                <div class="span3">No Faktur Jual:</div>
                <div class="span9">
                    <select name="nojual" id="s2_1" style="width: 100%;">
                        @foreach ($juals as $key => $item)
                            <option value={{ $item['nojual'] }}>{{ $item['nojual'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal Retur Jual:</div>
                <div class="span9">{!! Form::input('date','tglreturjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection