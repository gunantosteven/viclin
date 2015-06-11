@extends('/admin/app')

@section('content')
<div class="container">
<h1>Retur Per Faktur Penjualan</h1>
    <table class="table table-striped table-bordered table-hover">
         <thead>
         <tr class="bg-info">
             <th>Kode Barang</th>
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

     {!! Form::open(['url' => 'admin/sales/detailinputfaktur']) !!}
        <div class="form-group">
            {!! Form::label('kodebrg', 'Kode Barang:') !!}
            {!! Form::text('kodebrg',null,['class'=>'form-control']) !!}
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
            {!! Form::label('noreturjual', 'No Retur Jual:') !!}
            {!! Form::text('noreturjual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('nojual', 'No Faktur:') !!}
            {!! Form::text('nojual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('tglreturjual', 'Tanggal Retur Jual:') !!}
            {!! Form::input('date','tglreturjual',null,['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Retur', ['class' => 'btn btn-primary']) !!}
        </div>
    
    {!! Form::close() !!}
</div>
@endsection