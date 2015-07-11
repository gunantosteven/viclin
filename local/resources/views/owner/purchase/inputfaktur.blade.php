@extends('/owner/app')

@section('content')
<h1>Input Purchase Invoice</h1>

<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Insert Item</h1>
        </div>
        
        {!! Form::open(['url' => 'owner/purchase/detailinputfaktur']) !!}
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
                             <th>Information</th>
                             <th colspan="1">Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @if (Session::has('purchaseitems')) 
                            @foreach (Session::get('purchaseitems') as $key => $item)

                            <tr>
                                 <td>{{ DB::table('items')->where('kodebrg', $item['kodebrg'])->first()->namabrg }}</td>
                                 <td>{{ number_format($item['hargasatuankg'], 2) }}</td>
                                 <td>{{ $item['jumlahkg'] }}</td>
                                 <td>{{ $item['jumlahekor'] }}</td>
                                 <td>{{ $item['keterangan'] }}</td>
                                 <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', $item['id'] ]]) !!}
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
                     @if (Session::has('purchaseitems') && count(Session::get('purchaseitems')) > 0) 
                         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', -1 ]]) !!}
                         {!! Form::submit('Delete All', ['class' => 'btn btn-danger pull-right']) !!}
                         {!! Form::close() !!}
                     @endif
                </div>
            </div>

            {!! Form::open(['url' => 'owner/purchase/inputfaktur']) !!}
        
            <div class="row-form clearfix">
                <div class="span3">Supplier:</div>
                <div class="span9">
                    <select name="idsupp" id="s2_1supplier" style="width: 100%;">
                        @foreach ($suppliers as $key => $item)
                            <option value={{ $item['id'] }}>{{ $item['namasupp'] }}</option>
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
                <div class="span3">Expansion Cost:</div>
                <div class="span9">{!! Form::text('biayaexspbeli',null,['class'=>'']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Quarantine Cost:</div>
                <div class="span9">{!! Form::text('biayakarantina',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Clearance Cost:</div>
                <div class="span9">{!! Form::text('biayaclearance',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Import Cost:</div>
                <div class="span9">{!! Form::text('biayaimpor',null,['class'=>'']) !!}</div>
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
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.selectpicker').selectpicker();
</script>
<!-- there has been purchase invoice from Supplier  -->
<!-- @if (isset($nobeli) && $nobeli != "")
<script>
  var w = window.open('{{url('owner/purchase/cetakfaktur',$nobeli)}}', '_blank');
  w.focus();
</script>
@endif -->
@if (isset($validasi) && $validasi === true)
<script>
  window.alert('Data\'s been not filled yet');
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
@endsection