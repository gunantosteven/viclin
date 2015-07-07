@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Create Supplier</h1>
        </div>
        
        {!! Form::open(['url' => 'owner/suppliers']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">IDSupplier:</div>
                <div class="span9">{!! Form::text('niksupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Name:</div>
                <div class="span9">{!! Form::text('namasupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Address:</div>
                <div class="span9">{!! Form::textarea('alamatsupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Phone:</div>
                <div class="span9">{!! Form::text('telpsupp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">City:</div>
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