@extends('/admin/app')

@section('content')
<h1>Input Sales Invoice</h1>

<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Item</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/sales/detailinputfaktur']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Item Name:</div>
                <div class="span9">
                    <select name="kodebrg" id="s2_1item" style="width: 100%;">
                        @foreach ($items as $key => $item)
                            <option value={{ $item['kodebrg'] }}>{{ $item['namabrg'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Unit Price Kg:</div>
                <div class="span9">{!! Form::text('hargasatuankg',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Kg:</div>
                <div class="span9">{!! Form::text('jumlahkg',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Tail:</div>
                <div class="span9">{!! Form::text('jumlahekor',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">No Of Box:</div>
                <div class="span9">{!! Form::text('noofbox',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Add Item', ['class' => 'btn btn-success']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

 
 <hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Invoice</h1>
        </div>

        
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span12">
                    <table class="table table-striped table-bordered table-hover">
                         <thead>
                         <tr class="bg-info">
                             <th>Item Name</th>
                             <th>Unit Price Kg</th>
                             <th>Total Kg</th>
                             <th>Total Tail</th>
                             <th>No Of Box</th>
                             <th>Information</th>
                             <th colspan="1">Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @if (Session::has('salesitems')) 
                            @foreach (Session::get('salesitems') as $key => $item)

                            <tr>
                                 <td>{{ DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
                                 <td>{{ number_format($item['hargasatuankg'], 2) }}</td>
                                 <td>{{ $item['jumlahkg'] }}</td>
                                 <td>{{ $item['jumlahekor'] }}</td>
                                 <td>{{ $item['noofbox'] }}</td>
                                 <td>{{ $item['keterangan'] }}</td>
                                 <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailinputfaktur.destroy', $item['id']], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                 </td>
                            </tr>

                            @endforeach
                            </td>
                         @endif
                         </tbody>


                     </table>
                     <br>
                     @if (Session::has('salesitems') && count(Session::get('salesitems')) > 0) 
                         {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailinputfaktur.destroy', -1 ], 'onsubmit'=>'return confirm(\'Do you want to delete all\')']) !!}
                         {!! Form::submit('Delete All', ['class' => 'btn btn-danger pull-right']) !!}
                         {!! Form::close() !!}
                     @endif
                </div>
            </div>

            {!! Form::open(['url' => 'admin/sales/inputfaktur']) !!}
        
            <div class="row-form clearfix">
                <div class="span3">Customer:</div>
                <div class="span9">
                    <select name="idcust" id="s2_1customer" style="width: 100%;">
                        @foreach ($customers as $key => $item)
                            <option value={{ $item['id'] }}>{{ $item['namacust'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Order Date:</div>
                <div class="span9">{!! Form::input('date','tglorderjual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Due Date:</div>
                <div class="span9">{!! Form::input('date','tgltempojual',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Delivery Date:</div>
                <div class="span9">{!! Form::input('date','deliverydate',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Expedition Cost:</div>
                <div class="span9">{!! Form::text('biayaekspjual',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Styrofoam Cost:</div>
                <div class="span9">{!! Form::text('biayastereo',null,['class'=>'','maxlength' => "14"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker();
</script>

@if (isset($nojual) && $nojual != "")
<script>
  var w = window.open('{{url('admin/sales/cetakfaktur',$nojual)}}', '_blank');
  w.focus();
</script>
@endif
@if (isset($validasi) && $validasi === true)
<script>
  window.alert('Data\'s been not filled yet');
</script>
@endif
@if (isset($checkstock) && $checkstock === true)
<script>
  window.alert('Stock Kg or Stock Tail cannot be minus');
</script>
@endif
@if (isset($checkitem) && $checkitem === true)
<script>
  window.alert('There is the same item in detail');
</script>
@endif
@if (isset($checkdetail) && $checkdetail === true)
<script>
  window.alert('There is no item inserted');
</script>
@endif
@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection