@extends('/admin/app')

@section('content')
<h1>Payment Confirmation</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Search Invoice</h1>
        </div>
            {!! Form::open(['method' => 'POST', 'route'=>['admin.sales.paymentconfirmation.showfaktur']]) !!}
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
         <th>Customer</th>
         <th>Order Date</th>
         <th>Due Date</th>
         <th>Payment Status</th>
         <th colspan="1">Actions</th>
     </tr>
     </thead>
     <tbody>
        @if($juals != null)
            @foreach ($juals as $key => $jual)
                <tr>
                     <td>{{ $jual['nojual'] }}</td>
                     <td>{{ DB::table('customers')->where('id', $jual['nikcust'])->first()->namacust }}</td>
                     <td>{{ date("d F Y",strtotime($jual['tglorderjual'])) }}</td>
                     <td>{{ date("d F Y",strtotime($jual['tgltempojual'])) }}</td>
                     <td>{{ $jual['payment'] }}</td>
                     <td><button class="btn" onclick="getVal(this.value)" value={{ $jual['nojual'] }}  >Select</button></td>
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
        
        {!! Form::open(['method' => 'PATCH', 'route'=>['admin.sales.paymentconfirmation.update']]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nojual" name="nojual" readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Payment Information:</div>
                <div class="span9"><input type="text" id="ketpayment" name="ketpayment"></div>
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
    $('#paymentinformation').focus();
  }
 </script>
@endsection


