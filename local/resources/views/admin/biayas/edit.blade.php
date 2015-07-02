@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Biaya</h1>
        </div>
        
        {!! Form::model($biaya,['method' => 'PATCH','route'=>['admin.biayas.update',$biaya->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Biaya:</div>
                <div class="span9">
                    <select name="biaya" id="s2_1item" style="width: 100%;">
                        <option value="BENSIN" @if($biaya->biaya == "BENSIN") {{ "selected" }} @endif>Bensin</option>
                        <option value="GAJIKARYAWAN" @if($biaya->biaya == "GAJIKARYAWAN") {{ "selected" }} @endif>Gaji Karyawan</option>
                        <option value="LAINLAIN" @if($biaya->biaya == "LAINLAIN") {{ "selected" }} @endif>Lain-Lain</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal:</div>
                <div class="span9">{!! Form::input('date','tgl',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Keterangan:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9">{!! Form::text('nominal',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
