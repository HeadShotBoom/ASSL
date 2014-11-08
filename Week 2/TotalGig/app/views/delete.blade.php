@extends('layout')

@section('content')

<h1>Delete {{ $gig->title }} <small>Are you sure?</small></h1>

<form action="{{ action('GigController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="gig" value="{{ $gig->id }}" />
    <input type="submit" name="btn btn-danger" value="Yes" />
    <a href="{{ action('GigController@index') }}" class="btn btn-default">No Way!</a>
</form>
@stop