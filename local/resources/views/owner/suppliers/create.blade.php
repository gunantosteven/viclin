@extends('/owner/app')

@section('content')
<h1>Create Supplier</h1>
{!! Form::open(['url' => 'owner/suppliers']) !!}
<div class="form-group">
    {!! Form::label('NIK', 'NIK:') !!}
    {!! Form::text('niksupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Nama', 'Nama:') !!}
    {!! Form::text('namasupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Alamat', 'Alamat:') !!}
    {!! Form::textarea('alamatsupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Telepon', 'Telepon:') !!}
    {!! Form::text('telpsupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Kota', 'Kota:') !!}
    {!! Form::text('kotasupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::email('emailsupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Limit', 'Limit:') !!}
    {!! Form::text('limitsupp',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection