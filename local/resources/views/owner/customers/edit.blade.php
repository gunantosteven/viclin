@extends('/owner/app')

@section('content')
<h1>Update Customer</h1>
{!! Form::model($customer,['method' => 'PATCH','route'=>['owner.customers.update',$customer->id]]) !!}
<div class="form-group">
    {!! Form::label('Nama', 'Nama:') !!}
    {!! Form::text('namacust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Alamat', 'Alamat:') !!}
    {!! Form::textarea('alamatcust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Telepon', 'Telepon:') !!}
    {!! Form::text('telpcust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Kota', 'Kota:') !!}
    {!! Form::text('kotacust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Email', 'Email:') !!}
    {!! Form::email('emailcust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('Limit', 'Limit:') !!}
    {!! Form::text('limitcust',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
@endsection
