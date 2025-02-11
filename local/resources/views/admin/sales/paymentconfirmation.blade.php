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
                     <td><a href="{{route('admin.sales.paymentconfirmation.edit',$jual['nojual'])}}" class="btn">Select</a></td>
                </tr>
            @endforeach
        @endif
        </td>

     </tbody>


 </table>
 @if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection


