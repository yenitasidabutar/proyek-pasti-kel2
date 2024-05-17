<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')

@section('title', 'renungan')
@section('page_name', 'Renungan Harian')
@section('content')
    @include('components.renunganshow')
    @include('sweetalert::alert')
@endsection
