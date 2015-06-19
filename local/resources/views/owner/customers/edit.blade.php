@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Customer</h1>
        </div>
        
        {!! Form::model($customer,['method' => 'PATCH','route'=>['owner.customers.update',$customer->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Nama:</div>
                <div class="span9">{!! Form::text('namacust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Alamat:</div>
                <div class="span9">{!! Form::textarea('alamatcust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Telepon:</div>
                <div class="span9">{!! Form::text('telpcust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kota:</div>
                <div class="span9">{!! Form::text('kotacust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Email:</div>
                <div class="span9">{!! Form::email('emailcust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Limit:</div>
                <div class="span9">{!! Form::text('limitcust',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
