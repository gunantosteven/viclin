@extends('/owner/app')

@section('content')
<div class="container">
	<h1>Revisi Biaya Penyusutan</h1>
        <div class="form-group">
            {!! Form::label('nobeli', 'No Faktur:') !!}
            {!! Form::text('nobeli',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('biayasusutbeli', 'Biaya Susut Beli:') !!}
            {!! Form::text('biayasusutbeli',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
        </div>
</div>
@endsection
