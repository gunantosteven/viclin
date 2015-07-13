@extends('/owner/app')

@section('content')
<h1>Report Profit And Loss Period</h1>
<hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Faktur</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['owner.report.profitandlossperiod.store']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Start Date Invoice :</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">End Date Invoice:</div>
                    <div class="span9">{!! Form::input('date','tanggalakhir',$tanggalakhir,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <input class="btn btn-primary" type="submit" value="Cetak" onclick="$('form').attr('target', '_blank');">
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
@endsection