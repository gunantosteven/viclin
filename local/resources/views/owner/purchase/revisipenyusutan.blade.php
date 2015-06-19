@extends('/owner/app')

@section('content')
<h1>Revisi Biaya Penyusutan</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Faktur</h1>
        </div>
            {!! Form::open(['url' => 'owner/customers']) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Awal:</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',null,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Akhir:</div>
                    <div class="span9">{!! Form::input('date','tanggalakhir',null,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    {!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
            {!! Form::close() !!}
    </div>
</div>
<hr>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-info">
         <th>No Faktur</th>
         <th>Tanggal Order</th>
         <th>Biaya Penyusutan</th>
         <th colspan="1">Actions</th>
        </tr>
    </thead>
    <tbody>
     <tr>
         <td></td>
         <td></td>
         <td></td>
         <td><a href="" class="btn btn-warning">Revisi</a></td>
     </tr>
    </tbody>
</table>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Revisi Biaya Penyusutan</h1>
        </div>
        
        {!! Form::open(['url' => 'owner/sales/detailinputfaktur']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">No Faktur:</div>
                <div class="span9"><input type="text" id="nobeli" placeholder='20150617000000' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Biaya Susut Beli:</div>
                <div class="span9">{!! Form::text('biayasusutbeli',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection
