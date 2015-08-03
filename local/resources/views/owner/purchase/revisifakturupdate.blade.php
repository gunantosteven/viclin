@extends('/owner/app')

@section('content')
<h1>Revision Purchase Invoice {{ $beli->nobeli }}</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Item</h1>
        </div>
        
        {!! Form::open(['method' => 'POST', 'route'=>['owner.purchase.detailrevisifaktur.store']]) !!}
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
                <div class="span9">{!! Form::text('hargasatuankg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Kg:</div>
                <div class="span9">{!! Form::text('jumlahkg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Tail:</div>
                <div class="span9">{!! Form::text('jumlahekor',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Information:</div>
                <div class="span9">{!! Form::text('keterangan',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Add Item', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::hidden('nobeli', $beli->nobeli) !!}
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

 
 <hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Revision Invoice</h1>
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
                             <th>Information</th>
                             <th colspan="1">Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                            @foreach ($detilbelis as $key => $item)
                                <tr>
                                     <td>{{  DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
                                     <td>{{ number_format($item['hargasatuankg'], 2) }}</td>
                                     <td>{{ $item['jumlahkg'] }}</td>
                                     <td>{{ $item['jumlahekor'] }}</td>
                                     <td>{{ $item['keterangan'] }}</td>
                                     <td>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailrevisifaktur.destroy', $item['id'] ], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
                                        {!! Form::hidden('nobeli', $beli->nobeli) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                     </td>
                                </tr>
                            @endforeach
                            </td>
                         </tbody>


                    </table>
                </div>
            </div>
            {!! Form::model($beli,['method' => 'PATCH','route'=>['owner.purchase.revisifaktur.update',$beli->nobeli]]) !!}
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nobeli" placeholder='{{$beli->nobeli}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Supplier:</div>
                <div class="span9">
                    <select name="idsupp" id="s2_1supplier" style="width: 100%;">
                        @foreach ($suppliers as $key => $item)
                            @if($beli->idsupp == $item['id'])
                              <option selected="true" value={{ $item['id'] }}>{{ $item['namasupp'] }}</option>
                            @else
                              <option value={{ $item['id'] }}>{{ $item['namasupp'] }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Order Date:</div>
                <div class="span9">{!! Form::input('date','tglorderbeli',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Due Date:</div>
                <div class="span9">{!! Form::input('date','tgltempobeli',null,['class'=>'']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Quarantine Cost:</div>
                <div class="span9">{!! Form::text('biayakarantina',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Lab Cost:</div>
                <div class="span9">{!! Form::text('biayalab',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Freight Cost:</div>
                <div class="span9">{!! Form::text('biayafreight',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">CIF:</div>
                <div class="span9">{!! Form::text('cif',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@if (isset($nobeli) && $nobeli != "")
<script>
  var w = window.open('{{url('owner/purchase/cetakfaktur',$nobeli)}}', '_blank');
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
@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection