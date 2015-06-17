@extends('/owner/app')

@section('content')
<h1>Supplier Show</h1>

<div class="form-group">
    <label for="niksupp" class="col-sm-2 control-label">NIK Supplier</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="niksupp" placeholder='{{$supplier->niksupp}}' readonly>
    </div>
</div>
<div class="form-group">
    <label for="namasupp" class="col-sm-2 control-label">Nama Supplier</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="namasupp" placeholder='{{$supplier->namasupp}}' readonly>
    </div>
</div>
<div class="form-group">
    <label for="alamatsupp" class="col-sm-2 control-label">Alamat Supplier</label>
    <div class="col-sm-10">
        <textarea type="text" class="form-control" id="alamatsupp" placeholder='{{$supplier->alamatsupp}}' readonly></textarea>
    </div>
</div>
<div class="form-group">
    <label for="telpsupp" class="col-sm-2 control-label">Telepon Supplier</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="telpsupp" placeholder='{{$supplier->telpsupp}}' readonly>
    </div>
</div>
<div class="form-group">
    <label for="kotasupp" class="col-sm-2 control-label">Kota Supplier</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="kotasupp" placeholder='{{$supplier->kotasupp}}' readonly>
    </div>
</div>
<div class="form-group">
    <label for="emailsupp" class="col-sm-2 control-label">E-mail Supplier</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="emailsupp" placeholder='{{$supplier->emailsupp}}' readonly>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <a href="{{ url('owner/suppliers')}}" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection