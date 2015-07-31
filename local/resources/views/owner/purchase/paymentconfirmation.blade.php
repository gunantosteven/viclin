@extends('/owner/app')

@section('content')
<h1>Payment Confirmation</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Invoice</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['owner.purchase.paymentconfirmation.showfaktur']]) !!}
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
         <th>Payment Status</th>
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
                     <td>{{ $beli['payment'] }}</td>
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
            <h1>Payment Confirmation To Be PAID</h1>
        </div>
        
        {!! Form::open(['method' => 'PATCH', 'route'=>['owner.purchase.paymentconfirmation.update']]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nobeli" name="nobeli" readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Payment Information:</div>
                <div class="span9"><input type="text" id="ketpayment" name="ketpayment"></div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Paid', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

<script type="text/javascript">
  function getVal(value)
  {
    $('#nobeli').val(value);
    $('#ketpayment').focus();
  }
 </script>
@endsection