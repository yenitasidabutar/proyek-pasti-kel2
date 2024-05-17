<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home')

@section('title', 'Jadwal Ibadah')
@section('page_name', 'Jadwal Ibadah')
@section('content')
    @include('components.jadwal')
@endsection
