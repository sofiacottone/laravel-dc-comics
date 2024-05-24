@extends('layouts.app')

@section('content')
    <div class="container-fluid ms-bg-img">
        <div class="container py-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                @foreach ($comics as $comic)
                    <div class="col mt-3">
                        <div class="card h-100">
                            <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                            <div class="card-body vstack justify-content-between">
                                <h5 class="card-title fw-bold">{{ $comic->title }}</h5>
                                <div class="card-text text-primary">${{ $comic->price }}</div>
                                <div class="card-text"><span class="fw-bold">Series: </span>{{ $comic->series }}</div>
                                <div class="card-text"><span class="fw-bold">Type: </span>{{ $comic->type }}</div>

                                <div class="vstack justify-content-end">
                                    <a href="{{ route('comics.show', ['comic' => $comic->id]) }}"
                                        class="btn btn-outline-primary mt-2">More</a>
                                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                                        class="btn btn-outline-secondary mt-2">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
