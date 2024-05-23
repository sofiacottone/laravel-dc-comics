@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-3">Add new comic</h2>
        <form action="{{ route('comics.store') }}" method="POST" class="border rounded p-3">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" name="series">
            </div>
            <div class="mb-3">
                <label for="sale-date" class="form-label">Sale date (yyyy-mm-dd)</label>
                <input type="text" class="form-control" id="sale-date" name="sale_date">
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control" id="type" name="type">
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">Image Url</label>
                <input type="text" class="form-control" id="thumb" name="thumb">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="10" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
