@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Create Cost</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/biayas']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Cost:</div>
                <div class="span9">
                    <select name="biaya" id="s2_1item" style="width: 100%;">
                        <option value="BENSIN">Bensin</option>
                        <option value="GAJIKARYAWAN">Gaji Karyawan</option>
                        <option value="LAINLAIN">Lain-Lain</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Date:</div>
                <div class="span9">{!! Form::input('date','tgl',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::textarea('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9">{!! Form::text('nominal',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection