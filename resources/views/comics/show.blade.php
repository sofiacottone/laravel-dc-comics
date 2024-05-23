@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="hstack justify-content-center">
            <img src="{{ $comic->thumb }}" alt="">
        </div>
        <div class="vstack justify-content-center text-center mt-4">
            <div class="h3 fw-bold">{{ $comic->title }}</div>
            <div class="fs-4 text-primary">${{ $comic->price }}</div>
            <div class="fs-4"><span class="fw-bold">Series: </span>{{ $comic->series }}</div>
            <div class="fs-4"><span class="fw-bold">Type: </span>{{ $comic->type }}</div>
            <div class="fs-4"><span class="fw-bold">Sale date: </span>{{ $comic->sale_date }}</div>
            <div class="fs-4" style="text-align: justify"><span class="fw-bold">Description:
                </span>{{ $comic->description }}</div>
        </div>
    </div>
@endsection
