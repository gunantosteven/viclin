@extends('/owner/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Update Category</h1>
        </div>
        
        {!! Form::model($category,['method' => 'PATCH','route'=>['owner.categories.update',$category->id]]) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">Category Code:</div>
                <div class="span9">{!! Form::text('kodekategori',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Category Name:</div>
                <div class="span9">{!! Form::text('namakategori',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>
@endsection
