@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="hstack justify-content-between align-items-center mb-3">
            <div class=""><span class="fw-bold">Creation date: </span>{{ $comic->created_at->format('F d, Y h:i:s a') }}
            </div>
            <div class="hstack gap-1">
                <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}"
                    class="badge rounded-pill text-bg-secondary py-2 px-3">Edit
                </a>
                <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" data-comic-title="{{ $comic->title }}"
                        class="js-delete-btn badge rounded-pill text-bg-danger py-2 px-3 border-0">Delete</button>
                </form>
            </div>
        </div>

        <h2 class="text-center fw-bold fs-1 mb-3">{{ $comic->title }}</h2>
        <div class="d-flex justify-content-center ms-show-img">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
        </div>
        <div class="vstack justify-content-center text-center mt-4">
            <div class="fs-4 text-primary">${{ $comic->price }}</div>
            <div class="fs-4"><span class="fw-bold">Series: </span>{{ $comic->series }}</div>
            <div class="fs-4"><span class="fw-bold">Type: </span>{{ $comic->type }}</div>
            <div class="fs-4"><span class="fw-bold">Sale date: </span>{{ $comic->sale_date->format('Y/m/d') }}</div>
            <div class="fs-4" style="text-align: justify"><span class="fw-bold">Description:
                </span>{{ $comic->description }}</div>
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
@endsection
