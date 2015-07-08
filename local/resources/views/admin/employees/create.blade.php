@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Create Employee</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/employees']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Name:</div>
                <div class="span9">{!! Form::text('namaemp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Address:</div>
                <div class="span9">{!! Form::textarea('alamatemp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Phone:</div>
                <div class="span9">{!! Form::text('telpemp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">City:</div>
                <div class="span9">{!! Form::text('kotaemp',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Date of Entry:</div>
                <div class="span9">{!! Form::input('date','tglmasuk',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Status:</div>
                <div class="span9">
                    <select name="status" id="s2_1" style="width: 100%;">
                        <option value="WORKING">WORKING</option>
                        <option value="RESIGN">RESIGN</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection