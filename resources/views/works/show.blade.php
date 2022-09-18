@extends('layouts.main')

@section('title', $work->title)

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            <div class="card text-center">
                <div class="card-header">
                    {{ $work->type }}
                </div>
                <div class="card-body">
                    <img src="{{ $work->thumb }}" alt="">
                    <h1 class="card-title">{{ $work->title }}</h1>
                    <h5 class="card-title">{{ $work->series }}</h5>
                    <p class="card-text">{{ $work->description }}</p>
                    <h6>{{ $work->price }}€</h6>
                </div>
                <div class="form-group p-3 text-center">
                    <a href="{{ route('works.edit', $work->slug) }}" class="btn btn-sm btn-success mx-1">
                        Edit comic
                    </a>
                    <a href=" " class="btn btn-sm btn-danger mx-1">
                        Delete comic
                    </a>
                </div>
                <div class="card-footer text-muted">
                    {{ $work->sale_date }}
                </div>
            </div>
        </div>
    </div>
@endsection
