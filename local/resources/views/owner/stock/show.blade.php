@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Show Item Stock</h1>
        </div>
        
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Kode Barang:</div>
                <div class="span9"><input type="text" id="kodebrg" placeholder='{{$item->kodebrg}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Category:</div>
                <div class="span9"><input type="text" id="category" placeholder='{{ DB::table('categories')->where('id', $item->id_category)->first()->namakategori }}' readonly></textarea></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nama Barang:</div>
                <div class="span9"><input type="text" id="namabrg" placeholder='{{$item->namabrg}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Stock KG:</div>
                <div class="span9"><input type="text" id="stokkg" placeholder='{{$item->stokkg}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Stock Barang:</div>
                <div class="span9"><input type="text" class="form-control" id="stokbrg" placeholder='{{$item->stokbrg}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Status:</div>
                <div class="span9"><input type="text" id="status" placeholder='{{$item->status}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                    <a href="{{ url('owner/items')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
        
    </div>
</div>
@endsection