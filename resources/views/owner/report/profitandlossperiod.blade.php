@extends('/owner/app')

@section('content')
<div class="container">
<h1>Laporan Laba Rugi Per Periode</h1>
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

</div>
@endsection