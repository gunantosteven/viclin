@extends('/owner/app')

@section('content')
<h1>View Purchase Invoice {{ $beli->nobeli }}</h1>
 
 <hr>
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>View Invoice</h1>
        </div>
        {!! Form::model($beli,['method' => 'PATCH','route'=>['owner.purchase.viewfaktur.update',$beli->nobeli]]) !!}
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
                                </tr>
                            @endforeach
                            </td>
                         </tbody>


                    </table>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">No Invoice:</div>
                <div class="span9"><input type="text" id="nobeli" placeholder='{{$beli->nobeli}}' readonly></div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Supplier:</div>
                <div class="span9">
                    {!! Form::text('namasupplier',DB::table('suppliers')->where('id', $beli->idsupp)->first()->namasupp,['class'=>'', 'readonly']) !!}
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Order Date:</div>
                <div class="span9">{!! Form::input('date','tglorderbeli',null,['class'=>'', 'readonly']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Due Date:</div>
                <div class="span9">{!! Form::input('date','tgltempobeli',null,['class'=>'', 'readonly']) !!}</div>
            </div>
           <div class="row-form clearfix">
                <div class="span3">Quarantine Cost:</div>
                <div class="span9">{!! Form::input('number','biayakarantina',null,['class'=>'','maxlength' => "14", 'step' => "0.01", 'readonly']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Lab Cost:</div>
                <div class="span9">{!! Form::input('number','biayalab',null,['class'=>'','maxlength' => "14", 'step' => "0.01", 'readonly']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Freight Cost:</div>
                <div class="span9">{!! Form::input('number','biayafreight',null,['class'=>'','maxlength' => "14", 'step' => "0.01", 'readonly']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">CIF:</div>
                <div class="span9">{!! Form::input('number','cif',null,['class'=>'','maxlength' => "14", 'step' => "0.01", 'readonly']) !!}</div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection