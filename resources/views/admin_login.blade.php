@extends("main")

@section('title')
Admin-login
@endsection

@section('content')
<form method ="post" action="{{Asset('admin-login')}}" id="form-admin_login">
	<h2>Login</h2>
	<input type="text" name="username" id="username" placeholder="Username" class="form-control"/>
	<input type="password" name="password" id="password" placeholder="Password" class="form-control"/>
	@if(isset($error_message))
	<label class="error"> {{$error_message}} </label>
	@endif
	<button class="btn btn-lg btn-success btn-block">Login</button>
</form>

@endsection
