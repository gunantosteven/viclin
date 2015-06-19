@extends('/owner/app')

@section('content')
<h1>Laporan Penjualan Per Periode</h1>
{!! Form::open(['url' => 'owner/customers']) !!}
<div class="form-group">
    {!! Form::label('TanggalAwal', 'Tanggal Awal:') !!}
    {!! Form::input('date','tanggalawal',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('TanggalAkhir', 'Tanggal Akhir:') !!}
    {!! Form::input('date','tanggalakhir',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Report', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection