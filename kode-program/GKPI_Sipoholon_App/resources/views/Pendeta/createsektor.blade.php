<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Sektor')
@section('page_name', 'Sektor')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createsektor')
@endsection
