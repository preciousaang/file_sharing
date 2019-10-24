@extends('layouts.base')
@section('title', 'Register')
@section('meta')
@parent
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div id="app">
    <register-component></register-component>
</div>
@section('js')
@parent
<script src="{{asset('js/app.js')}}"></script>
@endsection
@endsection