@extends('layouts.master')

@section('content')
    <h1>The best contener out there</h1>
    <form action="/" method="POST">
        //le csrf_field helper pour générer le champ token:
        {{ csrf_field() }}
        <input type="text" name="url" value="{{ old('url') }}" placeholder="Enter your original URL here">
        {!! $errors->first('url', '<p>:message</p>') !!}
        <input type="submit" value="Shorten URL">
    </form>
@stop
