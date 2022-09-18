@extends('layouts.main')

@section('title', 'Create new comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-10">

                {{-- // Display all grouped errors  --}}
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}

                <form action="{{ route('works.update', $work->slug) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="input-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="input-title" name="title" value="{{ $work->title }}" required>
                        @error('title')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-description" class="form-label">Description</label>
                        <textarea class="form-control" id="input-description" cols="30" rows='8' name="description" required>{{ $work->description }}</textarea>
                        @error('description')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-thumb" class="form-label">Thumb</label>
                        <input type="text" class="form-control" id="input-thumb" name="thumb" value="{{ $work->thumb }}" required>
                        @error('thumb')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-price" class="form-label">Price</label>
                        <input type="number" step="0.01" class="form-control" id="input-price" name="price" value="{{ $work->price }}" required>
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-series" class="form-label">Series</label>
                        <input type="text" class="form-control" id="input-series" name="series" value="{{ $work->series }}" required>
                        @error('series')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-sale_date" class="form-label">Sale date</label>
                        <input type="date" class="form-control" id="input-sale_date" name="sale_date" value="{{ $work->sale_date }}" required>
                        @error('sale_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-type" class="form-label">Type</label>
                        <select class="form-select" name="type" id="type" required >
                            <option value="comic book" {{($work->type == 'comic book') ? 'selected' : ''}}>Comic Book</option>
                            <option value="graphic novel" {{$work->type == 'graphic novel' ? 'selected' : ''}}>Graphic Novel</option>
                            <option value="other" {{($work->type == 'other') ? 'selected' : ''}}>Other</option>
                        </select>
                        @error('type')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg">Edit your comic</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
