@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Biaya Show</h1>
        </div>
        
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Biaya:</div>
                <div class="span9"><input type="text" id="biaya" placeholder='{{$biaya->biaya}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Tanggal:</div>
                <div class="span9"><input type="text" id="tgl" placeholder='{{$biaya->tgl}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Keterangan:</div>
                <div class="span9"><textarea type="text" id="keterangan" placeholder='{{$biaya->keterangan}}' readonly></textarea></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal:</div>
                <div class="span9"><input type="text" id="nominal" placeholder='{{$biaya->nominal}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                    <a href="{{ url('admin/biayas')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>
</div>
@endsection