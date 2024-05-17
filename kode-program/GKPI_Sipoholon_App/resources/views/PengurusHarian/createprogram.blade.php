<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Program Kerja Pelayanan')
@section('page_name', 'Program Kerja Pelayanan')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createprogram')
@endsection
