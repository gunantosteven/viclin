@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Create Salary</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/salaries']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Employee:</div>
                <div class="span9">
                    <select name="idemp" id="s2_1" style="width: 100%;">
                        @foreach ($employees as $key => $employee)
                            <option value={{ $employee['id'] }}>{{ $employee['namaemp'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Transaction Date:</div>
                <div class="span9">{!! Form::input('date','tgltransaksi',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Month:</div>
                <div class="span9">
                    <select name="bulan" id="s2_1month" style="width: 100%;">
                        <option value="JANUARY">JANUARY</option>
                        <option value="FEBRUARY">FEBRUARY</option>
                        <option value="MARCH">MARCH</option>
                        <option value="APRIL">APRIL</option>
                        <option value="MAY">MAY</option>
                        <option value="JUNE">JUNE</option>
                        <option value="JULY">JULY</option>
                        <option value="AUGUST">AUGUST</option>
                        <option value="SEPTEMBER">SEPTEMBER</option>
                        <option value="OCTOBER">OCTOBER</option>
                        <option value="NOVEMBER">NOVEMBER</option>
                        <option value="DECEMBER">DECEMBER</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Year:</div>
                <div class="span9">
                    <select name="tahun" id="s2_1year" style="width: 100%;">
                        @for ($i = 2015; $i <= 2100; $i++)
                            <option value={{ $i }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::textarea('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9">{!! Form::input('number', 'nominal',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection