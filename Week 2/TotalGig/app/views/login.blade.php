@extends('layout')

@section('content')
<div class="row">
    <div class="small-12 medium-4 medium-push-3 columns">
{{ Form::open(array('url'=>'login'))}}

{{ Form::label('username', 'User Name') }}
{{ Form::text('username') }}
    </div>
    </div>
<div class="row">
    <div class="small-12 medium-4 medium-push-3 columns">
{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
</div>
    </div>
<div class="row">
    <div class="small-12 medium-4 medium-push-3 columns">
{{ Form::submit('Log In') }}
</div>
    </div>
{{ Form::close() }}
<br />
<div class="row">
    <div class="small-12 medium-4 medium-push-3 columns">
<h5>If you do not already have an account, <a href="{{ action('HomeController@register') }}">Register Here.</a></h5>
</div>
    </div>
@stop