@extends('layout')

@section('content')

<h1>Delete "{{ $gig->gig_name }}" <small>Are you sure?</small></h1>


<form action="{{ action('GigController@handleDelete') }}" method="post" role="form">
    <input type="hidden" name="gig" value="{{ $gig->id }}" />
</div>

    <input class="small-6 medium-1 columns" type="submit" value="Yes" />
    <a href="{{ action('GigController@index') }}" >No Way!</a>
</form>

@stop