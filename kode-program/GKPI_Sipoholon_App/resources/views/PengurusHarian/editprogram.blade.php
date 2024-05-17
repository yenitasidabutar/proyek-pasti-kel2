<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')
@section('title', 'Program Kerja Pelayanan')
@section('page_name', 'Program Kerja Pelayanan')
@section('content')
    @include('components.editprogram')
@endsection
