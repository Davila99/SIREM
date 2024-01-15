@extends('adminlte::page')

@section('styles-datatables')
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@section('scripts-datatbles')
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js" defer></script>
@endsection

@yield('styles-datatables')
@yield('scripts-datatbles')
