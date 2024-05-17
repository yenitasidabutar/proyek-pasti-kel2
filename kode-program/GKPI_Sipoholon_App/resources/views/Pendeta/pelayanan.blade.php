<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')
@section('title', 'pelayanan')
@section('page_name', 'Pelayanan')
@section('content')
    @include('components.pelayanan')
@endsection
