@extends('site.layouts.original.app')

@section('spinner')
    @include('site.guests.sections.spinner')
@endsection

@section('navbar')
    @include('site.guests.sections.navbar')
@endsection

@section('header')
    @include('site.guests.sections.about_header')
@endsection

@section('content')
    @include('site.guests.sections.about_us')
@endsection

@section('footer')
    @include('site.guests.sections.footer')
@endsection