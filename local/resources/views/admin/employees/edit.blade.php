@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Employee</h1>
        </div>
        
        {!! Form::model($employee,['method' => 'PATCH','route'=>['admin.employees.update',$employee->id]]) !!}
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
                <div class="span3">Since:</div>
                <div class="span9">{!! Form::input('date','tglmasuk',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Status:</div>
                <div class="span9">
                    <select name="status" id="status" style="width: 100%;">
                        <option value="ACTIVE" @if($employee->status == "ACTIVE") {{ "ACTIVE" }}@endif>ACTIVE</option>
                        <option value="QUIT" @if($employee->status == "QUIT") {{ "selected" }}@endif>QUIT</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
