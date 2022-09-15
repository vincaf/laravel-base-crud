@extends('layouts.main')

@section('title' . 'Create new comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-10">
                <form action="{{ route('works.store') }}" method="POST">
                    @csrf

                    {{-- $newWork = new Work();
                    $newWork->title = $work['title'];
                    $newWork->description = $work['description'];
                    $newWork->thumb = $work['thumb'];
                    $newWork->price = $work['price'];
                    $newWork->series = $work['series'];
                    $newWork->sale_date = $work['sale_date'];
                    $newWork->type = $work['type']; --}}

                    <div class="mb-3">
                        <label for="input-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="input-title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="input-description" class="form-label">Description</label>
                        <textarea class="form-control" id="input-description" cols="30" rows='8' name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="input-thumb" class="form-label">Thumb</label>
                        <input type="text" class="form-control" id="input-thumb" name="thumb">
                    </div>
                    <div class="mb-3">
                        <label for="input-price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="input-price" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="input-series" class="form-label">Series</label>
                        <input type="text" class="form-control" id="input-series" name="series">
                    </div>
                    <div class="mb-3">
                        <label for="input-sale_date" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="input-sale_date" name="sale_date">
                    </div>
                    <div class="mb-3">
                        <label for="input-type" class="form-label">Type</label>
                        <input type="text" class="form-control" id="input-type" name="type">
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Submit your comic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection