@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcom to this practice</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>console.log('Hi!')</script>
@stop
@section('footer')
By Amel ~ {{ date('d M Y') }} ~ <i class="fa fa-heart"></i>
@stop