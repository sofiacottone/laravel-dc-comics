@extends('layouts.app')

@section('content')
    <div class="container pt-4">
        <div class="row row-cols-4">
            @foreach ($comics as $comic)
                <div class="col mt-3">
                    <div class="card">
                        <img src="{{ $comic->thumb }}" class="card-img-top" alt="{{ $comic->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic->title }}</h5>
                            <div class="card-text text-primary">${{ $comic->price }}</div>
                            <div class="card-text">Series: {{ $comic->series }}</div>
                            <div class="card-text">Type: {{ $comic->type }}</div>

                            <div class="hstack gap-2">
                                <a href="{{ route('comics.show', ['comic' => $comic->id]) }}"
                                    class="btn btn-primary mt-2">More</a>
                                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                                    class="btn btn-secondary mt-2">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
