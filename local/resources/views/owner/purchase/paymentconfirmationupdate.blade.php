@extends('/owner/app')

@section('content')
<h1>Payment Confirmation {{ $beli->nobeli }}</h1>

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
                <div class="span9"><input type="text" id="nobeli" name="nobeli" value={{ $beli->nobeli }} readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Purchase:</div>
                <div class="span9"><input type="text" id="purchase" name="purchase" value={{ $purchase }} readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Depreciation Cost:</div>
                <div class="span9"><input type="text" id="depreciationCost" name="depreciationCost" value={{ $depreciationCost }} readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Payment (Purchase - Depreciation):</div>
                <div class="span9"><input type="text" id="totalpayment" name="totalpayment" value={{ $totalpayment }} readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Nominal Payment:</div>
                <div class="span9"><input type="number" id="nominalpayment" name="nominalpayment" maxlength = "14" step="0.01" value={{ $beli->nominalpayment }}></div>
            </div>
            <div class="row-form clearfix">
                    <div class="span3">Payment Date:</div>
                    <div class="span9">{!! Form::input('date','paymentdate', $beli->paymentdate,['class'=>'form-control']) !!}</div>
                </div>
            <div class="row-form clearfix">
                <div class="span3">Payment Information:</div>
                <div class="span9"><input type="text" id="ketpayment" name="ketpayment" value={{ $beli->ketpayment }}></div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Paid', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@if (isset($over) && $over === true)
<script>
  window.alert('Nominal Payment cannot be over Total Payment');
</script>
@endif
@endsection