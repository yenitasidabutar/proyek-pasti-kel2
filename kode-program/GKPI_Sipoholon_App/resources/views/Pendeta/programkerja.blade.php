<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')

@section('title', 'rancangan program kerja')
@section('page_name', 'Program Kerja Pelayanan')
@section('content')
    @include('components.programkerja')
    @include('sweetalert::alert')
@endsection
