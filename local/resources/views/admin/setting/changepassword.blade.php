@extends('/admin/app')

@section('content')
<div class="row-fluid">
                
    <div class="span12">
        <div class="head clearfix">
            <div class="isw-documents"></div>
            <h1>Change Password Admin</h1>
        </div>
        
        {!! Form::open(['url' => 'admin/setting/changepassword']) !!}
        <div class="block-fluid"> 
            <div class="row-form clearfix">
                <div class="span3">New Password:</div>
                <div class="span9">{!! Form::password('new_password',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                <div class="span3">Retype New:</div>
                <div class="span9">{!! Form::password('new_password2',null,['class'=>'']) !!}</div>
            </div>
            <div class="row-form clearfix">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
        {!! Form::close() !!}
        
    </div>
</div>

@if (isset($success) && $success === true)
<script>
  window.alert('Data successfully stored');
</script>
@endif
@if (isset($error) && $error === true)
<script>
  window.alert('There is an error, try to type new password again');
</script>
@endif

@endsection