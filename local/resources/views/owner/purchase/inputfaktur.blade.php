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
                    <select name="idbrg" id="s2_1item" style="width: 100%;">
                        @foreach ($items as $key => $item)
                            <option value={{ $item['id'] }}>{{ $item['namabrg'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Unit Price Per Kg:</div>
                <div class="span9">{!! Form::input('number','hargasatuankg',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Kg:</div>
                <div class="span9">{!! Form::input('number', 'jumlahkg',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Total Pcs:</div>
                <div class="span9">{!! Form::input('number','jumlahekor',null,['class'=>'']) !!}</div>
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
                             <th>Unit Price Per Kg</th>
                             <th>Total Kg</th>
                             <th>Total Pcs</th>
                             <th>Information</th>
                             <th colspan="1">Actions</th>
                         </tr>
                         </thead>
                         <tbody>
                         @if (Session::has('purchaseitems')) 
                            @foreach (Session::get('purchaseitems') as $key => $item)

                            <tr>
                                 <td>{{ DB::table('items')->where('id', $item['idbrg'])->first()->namabrg }}</td>
                                 <td>{{ number_format($item['hargasatuankg'], 2) }}</td>
                                 <td>{{ $item['jumlahkg'] }}</td>
                                 <td>{{ $item['jumlahekor'] }}</td>
                                 <td>{{ $item['keterangan'] }}</td>
                                 <td>
                                    {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', $item['id'] ], 'onsubmit'=>'return confirm(\'Do you want to delete it\')']) !!}
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
                         {!! Form::open(['method' => 'DELETE', 'route'=>['owner.purchase.detailinputfaktur.destroy', -1 ], 'onsubmit'=>'return confirm(\'Do you want to delete all\')']) !!}
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
                <div class="span3">Quarantine Cost:</div>
                <div class="span9">{!! Form::input('number', 'biayakarantina',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Lab Cost:</div>
                <div class="span9">{!! Form::input('number', 'biayalab',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Freight Cost:</div>
                <div class="span9">{!! Form::input('number', 'biayafreight',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">CIF:</div>
                <div class="span9">{!! Form::input('number', 'cif',null,['class'=>'','maxlength' => "14", 'step' => "0.01"]) !!}</div>
            </div>
            <div class="row-form clearfix">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
</div>
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
@if (isset($validasidate) && $validasidate === true)
<script>
  window.alert('Order Date cannot be more than Due Date');
</script>
@endif
@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@endsection