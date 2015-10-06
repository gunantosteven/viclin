@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Salary</h1>
        </div>
        
        {!! Form::model($salary,['method' => 'PATCH','route'=>['admin.salaries.update',$salary->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Employee:</div>
                <div class="span9">
                    <select name="idemp" id="s2_1" style="width: 100%;">
                        @foreach ($employees as $key => $employee)
                            <option value={{ $employee['id'] }} @if($salary->idemp == $employee['id']) {{ "selected" }} @endif>{{ $employee['namaemp'] }}</option>
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
                        <option value="JANUARY" @if($salary->bulan == "JANUARY") {{ "selected" }} @endif>JANUARY</option>
                        <option value="FEBRUARY" @if($salary->bulan == "FEBRUARY") {{ "selected" }} @endif>FEBRUARY</option>
                        <option value="MARCH" @if($salary->bulan == "MARCH") {{ "selected" }} @endif>MARCH</option>
                        <option value="APRIL" @if($salary->bulan == "APRIL") {{ "selected" }} @endif>APRIL</option>
                        <option value="MAY" @if($salary->bulan == "MAY") {{ "selected" }} @endif>MAY</option>
                        <option value="JUNE" @if($salary->bulan == "JUNE") {{ "selected" }} @endif>JUNE</option>
                        <option value="JULY" @if($salary->bulan == "JULY") {{ "selected" }} @endif>JULY</option>
                        <option value="AUGUST" @if($salary->bulan == "AUGUST") {{ "selected" }} @endif>AUGUST</option>
                        <option value="SEPTEMBER" @if($salary->bulan == "SEPTEMBER") {{ "selected" }} @endif>SEPTEMBER</option>
                        <option value="OCTOBER" @if($salary->bulan == "OCTOBER") {{ "selected" }} @endif>OCTOBER</option>
                        <option value="NOVEMBER" @if($salary->bulan == "NOVEMBER") {{ "selected" }} @endif>NOVEMBER</option>
                        <option value="DECEMBER" @if($salary->bulan == "DECEMBER") {{ "selected" }} @endif>DECEMBER</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Year:</div>
                <div class="span9">
                    <select name="tahun" id="s2_1year" style="width: 100%;">
                        @for ($i = 2015; $i <= 2100; $i++)
                            <option value={{ $i }} @if($salary->tahun == $i) {{ "selected" }} @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9">{!! Form::input('number', 'nominal',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
