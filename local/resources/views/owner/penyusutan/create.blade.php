@extends('/owner/app')

@section('content')
<h1>Input Biaya Penyusutan</h1>
{!! Form::open(['url' => 'owner/purchase/detailinputfaktur']) !!}
    <div class="form-group">
        {!! Form::label('nobeli', 'No Faktur:') !!}
        {!! Form::text('nobeli',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('biayasusutbeli', 'Biaya Susut Beli:') !!}
        {!! Form::text('biayasusutbeli',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
    </div>
{!! Form::close() !!}
@endsection