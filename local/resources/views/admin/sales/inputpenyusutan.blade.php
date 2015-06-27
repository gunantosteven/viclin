@extends('/admin/app')

@section('content')
<h1>Input Biaya Penyusutan</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Faktur</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['admin.sales.inputpenyusutan.showfaktur']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Awal Faktur :</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">Tanggal Akhir Faktur:</div>
                    <div class="span9">{!! Form::input('date','tanggalakhir',$tanggalakhir,['class'=>'form-control']) !!}</div>
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
         <th>Biaya Penyusutan</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
        @if($juals != null)
            @foreach ($juals as $key => $jual)
                <tr>
                     <td>{{ $jual['nojual'] }}</td>
                     <td>{{ DB::table('customers')->where('id', $jual['nikcust'])->first()->namacust }}</td>
                     <td>{{ $jual['tglorderjual'] }}</td>
                     <td>{{ $jual['tgltempojual'] }}</td>
                     <td>{{ $jual['biayasusutjual'] }}</td>
                     <td><button class="btn" onclick="getVal(this.value)" value={{ $jual['nojual'] }}  >Pilih</button></td>
                </tr>
            @endforeach
        @endif
        </td>

     </tbody>


 </table>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Biaya Penyusutan</h1>
        </div>
        
        {!! Form::open(['method' => 'PATCH', 'route'=>['admin.sales.inputpenyusutan.update']]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">No Faktur:</div>
                <div class="span9"><input type="text" id="nojual" name="nojual" readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Biaya Susut Jual:</div>
                <div class="span9"><input type="text" id="biayasusutjual" name="biayasusutjual"></div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

<script type="text/javascript">
  function getVal(value)
  {
    $('#nojual').val(value);
    $('#biayasusutjual').focus();
  }
 </script>
@endsection


