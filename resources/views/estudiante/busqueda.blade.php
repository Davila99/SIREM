@extends('adminlte::page')
@section('content')
<div class="container">
    <div id="reactapp"></div>
</div>
@stop 

@section('js')
<script src="{{ asset('js/app.js') }}" defer></script>
@endsection
