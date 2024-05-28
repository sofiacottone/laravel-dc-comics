@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-3">Edit: {{ $comic->title }}</h2>
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST" class="border rounded p-3">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $comic->title) }}">
                @error('title')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price"
                    value="{{ old('price', $comic->price) }}">
                @error('price')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series"
                    value="{{ old('series', $comic->series) }}">
                @error('series')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale-date" class="form-label">Sale date (yyyy-mm-dd)</label>
                <input type="text" class="form-control" id="sale-date" name="sale_date"
                    value="{{ old('sale_date', $comic->sale_date->format('Y/m/d')) }}">
                @error('sale_date')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type"
                    value="{{ old('type', $comic->type) }}">
                @error('type')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Image Url</label>
                <input type="text" class="form-control" id="thumb" name="thumb"
                    value="{{ old('thumb', $comic->thumb) }}">
                @error('thumb')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="10" class="form-control">{{ old('description', $comic->description) }}</textarea>
                @error('description')
                    <div class="text-danger ps-2 fw-bold">{{ $message }}</div>
                @enderror
            </div>


            <div class="hstack gap-2">
                <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </div>
@endsection
