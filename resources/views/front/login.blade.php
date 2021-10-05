@extends('front.layout.layout')

@section('contant')
<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Login</li>
    </ul>
	<h3> Login</h3>	
	<div class="well">
        @if($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li> {{ $error }}</li>
            @endforeach
        </div>
        @endif
        <form class="form-horizontal" method="POST" action="{{ route('login_check') }}" >
            @csrf
            <div class="control-group">
                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                <div class="controls">
                  <input type="text" id="input_email" name="email" placeholder="Email">
                </div>
            </div>	  
            <div class="control-group">
                <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
                <div class="controls">
                  <input type="password" name="password" id="inputPassword1" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="email_create" value="1">
                    <input type="hidden" name="is_new_customer" value="1">
                    <input class="btn btn-large btn-success" type="submit" value="Login" />
                </div>
            </div>		
        </form>
    </div>
    <h3> Registration</h3>	
	<div class="well">
        <form class="form-horizontal" method="POST" action="{{ route('user_store') }}">
            @csrf
            <div class="control-group">
                <label class="control-label" for="inputFname">First name <sup>*</sup></label>
                <div class="controls">
                  <input type="text" id="inputFname" name="first_name" placeholder="First Name">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputLname">Last name <sup>*</sup></label>
                <div class="controls">
                  <input type="text" id="inputLname" name="last_name" placeholder="Last Name"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="input_email">Email <sup>*</sup></label>
                <div class="controls">
                  <input type="text" id="input_email" name="email" placeholder="Email">
                </div>
            </div>	  
            <div class="control-group">
                <label class="control-label" for="inputPassword1">Password <sup>*</sup></label>
                <div class="controls">
                  <input type="password" name="password" id="inputPassword1" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <input type="hidden" name="email_create" value="1">
                    <input type="hidden" name="is_new_customer" value="1">
                    <input class="" type="submit" value="register" />
                </div>
            </div>		
        </form>
    </div>
</div>
@endsection