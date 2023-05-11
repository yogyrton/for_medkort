@extends('layouts.app')

@section('title', 'Админка')

@section('content')

@include('admin.menu')

    @yield('admin-content')

@endsection
