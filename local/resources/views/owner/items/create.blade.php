@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Create Item</h1>
        </div>
        
        {!! Form::open(['url' => 'owner/items']) !!}
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
	                            <option value={{ $category['id'] }}>{{ $category['namakategori'] }}</option>
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
	                	<option value="Live Food">Live Food</option>
	                	<option value="Frozen Food">Frozen Food</option>
	                </select>
            	</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Stock Tail:</div>
                <div class="span9">{!! Form::text('stokbrg',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@endsection