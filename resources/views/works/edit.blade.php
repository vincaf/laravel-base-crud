@extends('layouts.main')

@section('title', 'Edit comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-10">
                <form action="{{ route('works.update', $work->slug) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('works.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection
