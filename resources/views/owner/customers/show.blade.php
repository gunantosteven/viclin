@extends('/owner/app')

@section('content')
<div class="container">

<h1>Customer Show</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="namacust" class="col-sm-2 control-label">Nama Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="namacust" placeholder='{{$customer->namacust}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="alamatcust" class="col-sm-2 control-label">Alamat Customer</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" id="alamatcust" placeholder='{{$customer->alamatcust}}' readonly></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="telpcust" class="col-sm-2 control-label">Telepon Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="telpcust" placeholder='{{$customer->telpcust}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="kotacust" class="col-sm-2 control-label">Kota Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kotacust" placeholder='{{$customer->kotacust}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="emailcust" class="col-sm-2 control-label">E-mail Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="emailcust" placeholder='{{$customer->emailcust}}' readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="limitcust" class="col-sm-2 control-label">Limit Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="limitcust" placeholder='{{$customer->limitcust}}' readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('owner/customers')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>

</div>

@endsection