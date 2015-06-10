@extends('/admin/app')

@section('content')
<div class="container">
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
         @endif
         </tbody>

     </table>
     {!! Form::open(['url' => 'admin/sales/detailinputfaktur']) !!}
        <div class="form-group">
            {!! Form::label('kodebrg', 'Kode Barang:') !!}
            {!! Form::text('kodebrg',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('hargajual', 'Harga Jual:') !!}
            {!! Form::text('hargajual',null,['class'=>'form-control']) !!}
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

    {!! Form::open(['url' => 'admin/sales/inputfaktur']) !!}
        <div class="form-group">
            {!! Form::label('nojual', 'No Faktur:') !!}
            {!! Form::text('nojual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('customer', 'Customer:') !!}
            {!! Form::text('customer',null,['class'=>'form-control']) !!}
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
            {!! Form::label('biayasteroform', 'Biaya Steroform:') !!}
            {!! Form::text('biayasteroform',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('biayasusutjual', 'Biaya Susut Jual:') !!}
            {!! Form::text('biayasusutjual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('kursterbaru', 'Kurs Rupiah Terbaru:') !!}
            {!! Form::text('kursterbaru',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        </div>
    
    {!! Form::close() !!}
</div>
@endsection