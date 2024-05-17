<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home')
@section('title', 'sektor')
@section('page_name', 'Sektor')
@section('content')
    @include('components.sektorshowanggota')
@endsection
