<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')

@section('title', 'Rancangan Anggaran Penerimaan dan Belanja')
@section('page_name', 'Program Kerja Pelayanan')
@section('content')
    @include('components.RAPB')
    @include('sweetalert::alert')
@endsection
