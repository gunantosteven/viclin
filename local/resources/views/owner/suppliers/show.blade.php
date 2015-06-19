@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Supplier Show</h1>
        </div>
        
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">NIK:</div>
                <div class="span9"><input type="text" id="niksupp" placeholder='{{$supplier->niksupp}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nama</div>
                <div class="span9"><input type="text"  id="namasupp" placeholder='{{$supplier->namasupp}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Alamat:</div>
                <div class="span9"><textarea type="text" id="alamatsupp" placeholder='{{$supplier->alamatsupp}}' readonly></textarea></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Telepon:</div>
                <div class="span9"><input type="text" id="telp" placeholder='{{$supplier->telpsupp}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Kota:</div>
                <div class="span9"><input type="text" id="kotasupp" placeholder='{{$supplier->kotasupp}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Email:</div>
                <div class="span9"><input type="text" id="emailcust" placeholder='{{$supplier->emailsupp}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                    <a href="{{ url('owner/supplier')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>
</div>
@endsection