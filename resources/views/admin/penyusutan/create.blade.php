@extends('/admin/app')

@section('content')
<div class="container">
<h1>Input Biaya Penyusutan</h1>
    {!! Form::open(['url' => 'admin/sales/detailinputfaktur']) !!}
        <div class="form-group">
            {!! Form::label('nojual', 'No Faktur:') !!}
            {!! Form::text('nojual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('biayasusutjual', 'Biaya Susut Jual:') !!}
            {!! Form::text('biayasusutjual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
</div>
@endsection