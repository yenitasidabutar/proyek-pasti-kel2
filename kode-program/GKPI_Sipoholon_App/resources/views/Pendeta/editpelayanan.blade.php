<?php
$navbars = StaticVariable::$navbarPendeta;
?>
@extends('layouts.home5')
@section('title', 'Jadwal Pelayanan')
@section('page_name', 'Jadwal Pelayanan')

@section('content')
    @include('components.editpelayanan')
@endsection
