@extends('layouts.app')

@section('title') {{ $series->title }} @stop

@section('header')
    <header class="header header-inverse" style="background-color: #0dd1bc;">
        <div class="container text-center">

            <div class="row">
                <div class="col-12 col-lg-8 offset-lg-2">

                    <h1>{{ $series->title }}</h1>
                    <p class="fs-20 opacity-70">Customize your series lessons</p>

                </div>
            </div>

        </div>
    </header>
@stop

@section('content')
    <div class="section section-inverse">
        <div class="container">

            <div class="row gap-y">
                <div class="col-12">
                    <lessons default_lessons="{{ $series->lessons }}" series_id="{{ $series->id }}"></lessons>
                </div>
            </div>
        </div>
    </div>
@stop