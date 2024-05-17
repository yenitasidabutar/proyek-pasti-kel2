<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Renungan Harian')
@section('page_name', 'Renungan Harian')
@section('navbar_content')

@endsection
@section('content')
    @include('components.createrenungan')
@endsection
