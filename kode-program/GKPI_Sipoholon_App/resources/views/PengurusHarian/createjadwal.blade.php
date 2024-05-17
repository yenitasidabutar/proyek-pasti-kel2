<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('style', asset('css/style/pendeta.css'))
@section('title', 'Jadwal Ibadah')
@section('page_name', 'Jadwal Ibadah'))
@section('navbar_content')

@endsection
@section('content')
    @include('components.createjadwal')
@endsection
