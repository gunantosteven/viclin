@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Cost</h1>
        </div>
        
        {!! Form::model($cost,['method' => 'PATCH','route'=>['admin.costs.update',$cost->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Cost:</div>
                <div class="span9">
                    <select name="biaya" id="s2_1item" style="width: 100%;">
                        <option value="BENSIN" @if($cost->biaya == "BENSIN") {{ "selected" }} @endif>Bensin</option>
                        <option value="BIAYAEKSPEDISI" @if($cost->biaya == "BIAYAEKSPEDISI") {{ "selected" }} @endif>Biaya Ekspedisi</option>
                        <option value="TOLPARKIR" @if($cost->biaya == "TOLPARKIR") {{ "selected" }} @endif>Tol Parkir</option>
                        <option value="LAINLAIN" @if($cost->biaya == "LAINLAIN") {{ "selected" }} @endif>Lain-Lain</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Date:</div>
                <div class="span9">{!! Form::input('date','tgl',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9">{!! Form::text('nominal',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
