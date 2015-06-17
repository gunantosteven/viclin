@extends('/owner/app')

@section('content')
<h1>Update Supplier</h1>
{!! Form::model($supplier,['method' => 'PATCH','route'=>['owner.suppliers.update',$supplier->id]]) !!}
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
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection
