<?php
$navbars = StaticVariable::$navbarPengurusHarian;
?>
@extends('layouts.home5')

@section('title', 'Jadwal Ibadah')

@section('page_name', 'Jadwal Ibadah')
@section('content')
    @include('components.editjadwal')
    @include('sweetalert::alert')
@endsection
