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
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('comics.show', ['comic' => $comic->id]) }}"
                                            class="btn btn-outline-primary mt-2 col">More</a>
                                        <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                                            class="btn btn-outline-secondary mt-2 col">Edit</a>
                                    </div>

                                    <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" data-comic-title="{{ $comic->title }}"
                                            class="js-delete-btn btn btn-outline-danger mt-2 w-100">Delete</abutton>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- modal  --}}
            <div id="confirmDeleteModal" class="ms-modal">

                {{-- Modal content --}}
                <div class="ms-modal-content">
                    <div class="hstack align-items-center justify-content-between mb-3">
                        <div class="hstack align-items-center justify-content-center gap-2">
                            <img src="https://img.icons8.com/ios/40/ffffff/box-important--v1.png" alt="box-important--v1" />
                            <div class="fs-3">Confirm delete</div>
                        </div>
                        <div class="ms-close">&times;</div>
                    </div>
                    <div class="ms-modal-body"></div>
                    <div class="hstack justify-content-end gap-2">
                        <button class="ms-close-btn btn btn-secondary">Cancel</button>
                        <button id="modal-confirm" class="btn btn-danger">Delete</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
