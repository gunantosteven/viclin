@extends('/owner/app')

@section('content')
<h1>Revision Depreciation Cost</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Invoice</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['owner.purchase.revisipenyusutan.showfaktur']]) !!}
            <div class="block-fluid"> 
                <div class="row-form clearfix">
                    <div class="span3">Start Date Invoice:</div>
                    <div class="span9">{!! Form::input('date','tanggalawal',$tanggalawal,['class'=>'form-control']) !!}</div>
                </div>
                <div class="row-form clearfix">
                    <div class="span3">End Date Invoice:</div>
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
         <th>No Invoice</th>
         <th>Supplier</th>
         <th>Order Date</th>
         <th>Due Date</th>
         <th>Depreciation Cost</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
        @if($belis != null)
            @foreach ($belis as $key => $beli)
                <tr>
                     <td>{{ $beli['nobeli'] }}</td>
                     <td>{{ DB::table('suppliers')->where('id', $beli['idsupp'])->first()->namasupp }}</td>
                     <td>{{ date("d F Y",strtotime($beli['tglorderbeli'])) }}</td>
                     <td>{{ date("d F Y",strtotime($beli['tgltempobeli'])) }}</td>
                     <td>{{ number_format($beli['biayasusutbeli'], 2) }}</td>
                     <td><button class="btn" onclick="getVal(this.value)" value={{ $beli['nobeli'] }}  >Select</button></td>
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
            <h1>Insert Depreciation Cost</h1>
        </div>
        
        {!! Form::open(['method' => 'PATCH', 'route'=>['owner.purchase.revisipenyusutan.update']]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nobeli" name="nobeli" readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Depreciation Cost Purchase:</div>
                <div class="span9"><input type="number" id="biayasusutbeli" maxlength = "14" step="0.01" name="biayasusutbeli"></div>
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
    $('#nobeli').val(value);
    $('#biayasusutbeli').focus();
  }
 </script>
@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection
