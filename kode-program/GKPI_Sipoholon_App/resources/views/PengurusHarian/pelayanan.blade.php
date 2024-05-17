<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')
@section('title', 'pelayanan')
@section('page_name', 'Pelayanan')
@section('content')
    @include('components.pelayanan')
@endsection
