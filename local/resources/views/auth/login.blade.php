@extends('app')

@section('content')
<body>
    
    <div class="loginBox">        
        <div class="loginHead">
            <img src="{{ asset('img/logo.png') }}" alt="Aquarius -  responsive admin panel" title="Aquarius -  responsive admin panel"/>
        </div>
        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
        @endif
        <form class="form-horizontal" action="{{ url('/auth/login') }}" method="POST">       

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="control-group">
                <label for="inputUsername">Username</label>                
                <input type="text" id="username" name="username"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" id="inputPassword" name="password"/>                
            </div>
            <!-- Not use remember me -->
            <!-- <div class="control-group" style="margin-bottom: 5px;">                
                <label class="checkbox"><input type="checkbox" name="remember"> Remember me</label>                                                
            </div> --> 
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        </form>        
        
    </div>    
    
</body>
@endsection