@extends('/admin/app')

@section('content')
<h1>Revisi Faktur Penjualan</h1>
<hr>
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
<table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>No Faktur</th>
         <th>Customer</th>
         <th>Tanggal Order</th>
         <th>Tanggal Jatuh Tempo</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>

        <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td>
                <a href="{{route('admin.sales.revisifaktur.edit',1)}}" class="btn btn-warning">Revisi</a>
             </td>
        </tr>

        </td>

     </tbody>


 </table>
@endsection