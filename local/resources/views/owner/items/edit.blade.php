@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Item</h1>
        </div>
        
        {!! Form::model($item,['method' => 'PATCH','route'=>['owner.items.update',$item->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Item Code:</div>
                <div class="span9">{!! Form::text('kodebrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Category:</div>
                <div class="span9">
                    <select name="id_category" id="id_category" style="width: 100%;">
                            @foreach ($categories as $key => $category)
                                @if($item->id_category == $category['id'])
                                  <option selected="true" value={{ $category['id'] }}>{{ $category['namakategori'] }}</option>
                                @else
                                  <option value={{ $category['id'] }}>{{ $category['namakategori'] }}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Item Name:</div>
                <div class="span9">{!! Form::text('namabrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Stock Kg:</div>
                <div class="span9">{!! Form::text('stokkg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Status:</div>
                <div class="span9">
                    <select name="status" id="status" style="width: 100%;">
                        <option value="Live Food" @if($item->status == "Live Food") {{ "selected" }}@endif>Live Food</option>
                        <option value="Frozen Food" @if($item->status == "Frozen Food") {{ "selected" }}@endif>Frozen Food</option>
                    </select>
                </div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Stock Tail:</div>
                <div class="span9">{!! Form::text('stokbrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
