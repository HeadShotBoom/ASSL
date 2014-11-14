@extends('layout')

@section('content')
<div class="page-header">
    <h1>Edit Gig</h1>
</div>

<div class="row">
<form action="{{ action('GigController@handleEdit') }}" method="post" role="form">
    <input type="hidden" name="id" value="{{ $gig->id }}" />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="gig_name">Gig Name</label>
        <input type="text" class="form-control" name="gig_name" value="{{ $gig->gig_name }}" />
        @if($errors->has('gig_name'))
        <span class="error">{{ $errors->first('gig_name') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="client_name">Client Name</label>
        <input type="text" class="form-control" name="client_name" value="{{ $gig->client_name }}" />
        @if($errors->has('client_name'))
        <span class="error">{{ $errors->first('client_name') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="phone">Phone Number</label>
        <input type="text" class="form-control" name="phone" value="{{ $gig->phone }}" />
        @if($errors->has('phone'))
        <span class="error">{{ $errors->first('phone') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" value="{{ $gig->email }}" />
        @if($errors->has('email'))
        <span class="error">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="gig_date">Gig Date</label>
        <input name="gig_date" id="demo2" type="text" size="25" value="{{ $gig->gig_date }}"><a href="javascript:NewCal('demo2','ddmmmyyyy',true,12)"><img src="{{ URL::asset('img/cal.gif') }}" width="16" height="16" border="0" alt="Pick a date"></a>
        @if($errors->has('gig_date'))
        <span class="error">{{ $errors->first('gig_date') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="employee1">Employee 1</label>
        <select name="employee1" value="{{ $gig->employee1 }}">
            <option value="0"></option>
            <option value="1">Daniel</option>
            <option value="2">Jen</option>
            <option value="3">Rene</option>
            <option value="4">None</option>
        </select>
        @if($errors->has('employee1'))
        <span class="error">{{ $errors->first('employee1') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="employee2">Employee 2</label>
        <select name="employee2" value="{{ $gig->employee2 }}">
            <option value="0"></option>
            <option value="1">Daniel</option>
            <option value="2">Jen</option>
            <option value="3">Rene</option>
            <option value="4">None</option>
        </select>
        @if($errors->has('emplpoyee2'))
        <span class="error">{{ $errors->first('employee2') }}</span>
        @endif
    </div>
    <br />
    <div class="small-12 medium-8 medium-push-2 columns">
        <label for="employee3">Employee 3</label>
        <select name="employee3" value="{{ $gig->employee3 }}">
            <option value="0"></option>
            <option value="1">Daniel</option>
            <option value="2">Jen</option>
            <option value="3">Rene</option>
            <option value="4">None</option>
        </select>
        @if($errors->has('employee3'))
        <span class="error">{{ $errors->first('employee3') }}</span>
        @endif
    </div>
    <div class="small-12 medium-5 medium-pull-5 columns">
    <input type="submit" value="Edit" class="btn btn-primary" />
    <a href="{{ action('GigController@index') }}" class="btn btn-link">Cancel</a>
</form>
</div>
@stop