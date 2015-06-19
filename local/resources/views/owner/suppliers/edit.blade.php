@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Supplier</h1>
        </div>
        
        {!! Form::model($supplier,['method' => 'PATCH','route'=>['owner.suppliers.update',$supplier->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">NIK:</div>
                <div class="span9">{!! Form::text('niksupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nama:</div>
                <div class="span9">{!! Form::text('namasupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Alamat:</div>
                <div class="span9">{!! Form::textarea('alamatsupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Telepon:</div>
                <div class="span9">{!! Form::text('telpsupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kota:</div>
                <div class="span9">{!! Form::text('kotasupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Email:</div>
                <div class="span9">{!! Form::email('emailsupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
