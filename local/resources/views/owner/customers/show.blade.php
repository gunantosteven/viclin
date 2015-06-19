@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Customer Show</h1>
        </div>
        
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Nama:</div>
                <div class="span9"><input type="text" id="namacust" placeholder='{{$customer->namacust}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Alamat:</div>
                <div class="span9"><textarea type="text" id="alamatcust" placeholder='{{$customer->alamatcust}}' readonly></textarea></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Telepon:</div>
                <div class="span9"><input type="text" id="telpcust" placeholder='{{$customer->telpcust}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kota:</div>
                <div class="span9"><input type="text" id="kotacust" placeholder='{{$customer->kotacust}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Email:</div>
                <div class="span9"><input type="text" id="emailcust" placeholder='{{$customer->emailcust}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Limit:</div>
                <div class="span9"><input type="text" id="limitcust" placeholder='{{$customer->limitcust}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                    <a href="{{ url('owner/customers')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>
</div>
@endsection