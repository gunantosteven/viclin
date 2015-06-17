@extends('/owner/app')

@section('content')
<h1>Input Faktur Pembelian</h1>
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

 {!! Form::open(['url' => 'owner/purchase/detailinputfaktur']) !!}
    <div class="form-group">
        {!! Form::label('kodebrg', 'Kode Barang:') !!}
        {!! Form::text('kodebrg',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hargabeli', 'Harga Beli:') !!}
        {!! Form::text('hargabeli',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jumlahkg', 'Jumlah Kg:') !!}
        {!! Form::text('jumlahkg',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', [
           'Live Food' => 'Live Food',
           'Frozen Food' => 'Frozen Food'],null,['class'=>'form-control']
        ) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Item', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}
 <hr>

{!! Form::open(['url' => 'owner/sales/inputfaktur']) !!}
    <div class="form-group">
        {!! Form::label('nobeli', 'No Faktur:') !!}
        {!! Form::text('nobeli',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('supplier', 'Supplier:') !!}
        {!! Form::text('supplier',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tanggalorder', 'Tanggal Order:') !!}
        {!! Form::input('date','tanggalorder',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tanggaljatuhtempo', 'Tanggal Jatuh Tempo:') !!}
        {!! Form::input('date','tanggaljatuhtempo',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayaekspedisi', 'Biaya Ekspedisi:') !!}
        {!! Form::text('biayaekspedisi',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayasusut', 'Biaya Susut:') !!}
        {!! Form::text('biayasusut',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayakarantina', 'Biaya Karantina:') !!}
        {!! Form::text('biayakarantina',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayaclearance', 'Biaya Clearance:') !!}
        {!! Form::text('biayaclearance',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayaimpor', 'Biaya Impor:') !!}
        {!! Form::text('biayaimpor',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayalab', 'Biaya Lab:') !!}
        {!! Form::text('biayalab',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayafreight', 'Biaya Freight:') !!}
        {!! Form::text('biayafreight',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>

{!! Form::close() !!}
@endsection