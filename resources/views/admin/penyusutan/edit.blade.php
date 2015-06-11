@extends('/admin/app')

@section('content')
<div class="container">
	<h1>Revisi Biaya Penyusutan</h1>
        <div class="form-group">
            {!! Form::label('nojual', 'No Faktur:') !!}
            {!! Form::text('nojual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('biayasusutjual', 'Biaya Susut Jual:') !!}
            {!! Form::text('biayasusutjual',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
        </div>
</div>
@endsection
