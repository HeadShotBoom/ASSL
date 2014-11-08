@extends('layout')

@section('content')

{{ Form::open(array('url'=>'register')) }}


{{ Form::label('email', 'Email Address') }}
{{ Form::text('email') }}

@if($errors->has('email'))
<span class="error">{{ $errors->first('email') }}</span>
@endif
{{ Form::label('username', 'Username') }}
{{ Form::text('username') }}

@if($errors->has('username'))
<span class="error">{{ $errors->first('username') }}</span>
@endif

{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}

@if($errors->has('password'))
<span class="error">{{ $errors->first('password') }}</span>
@endif
{{ Form::submit('Submit') }}

{{ Form::close() }}


@stop