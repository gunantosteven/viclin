@extends('/admin/app')

@section('content')
<div class="container">

<h1>Item Show</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="kodebrg" class="col-sm-2 control-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kodebrg" placeholder='{{$item->kodebrg}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="category" class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="category" placeholder='{{ DB::table('categories')->where('id', $item->id_category)->first()->namakategori }}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="namabrg" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namabrg" placeholder='{{$item->namabrg}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="stokkg" class="col-sm-2 control-label">Stock KG</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stokkg" placeholder='{{$item->stokkg}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="status" placeholder='{{$item->status}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="stokbrg" class="col-sm-2 control-label">Stock Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stokbrg" placeholder='{{$item->stokbrg}}' readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('admin/items')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>

</div>

@endsection