@extends('/admin/app')

@section('content')
<h1>Revision Sales Invoice {{ $jual->nojual }}</h1>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Item</h1>
        </div>
        
        {!! Form::open(['method' => 'POST', 'route'=>['admin.sales.detailrevisifaktur.store']]) !!}
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
            {!! Form::hidden('nojual', $jual->nojual) !!}
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

 
 <hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Revisi Faktur</h1>
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
                            @foreach ($detiljuals as $key => $item)
                                <tr>
                                     <td>{{  DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
                                     <td>{{ number_format($item['hargasatuankg'], 2) }}</td>
                                     <td>{{ $item['jumlahkg'] }}</td>
                                     <td>{{ $item['jumlahekor'] }}</td>
                                     <td>{{ $item['keterangan'] }}</td>
                                     <td>
                                        {!! Form::open(['method' => 'DELETE', 'route'=>['admin.sales.detailrevisifaktur.destroy', $item['id'] ]]) !!}
                                        {!! Form::hidden('nojual', $jual->nojual) !!}
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
            {!! Form::model($jual,['method' => 'PATCH','route'=>['admin.sales.revisifaktur.update',$jual->nojual]]) !!}
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nojual" placeholder='{{$jual->nojual}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Customer:</div>
                <div class="span9">
                    <select name="nikcust" id="s2_1customer" style="width: 100%;">
                        @foreach ($customers as $key => $item)
                            @if($jual->nikcust == $item['id'])
                              <option selected="true" value={{ $item['id'] }}>{{ $item['namacust'] }}</option>
                            @else
                              <option value={{ $item['id'] }}>{{ $item['namacust'] }}</option>
                            @endif
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
                <div class="span3">Expedition Cost:</div>
                <div class="span9">{!! Form::text('biayaekspjual',null,['class'=>'']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Styrofoam Cost:</div>
                <div class="span9">{!! Form::text('biayastereo',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Rupiah Newest:</div>
                <div class="span9">{!! Form::text('kursbaru',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

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
@endsection