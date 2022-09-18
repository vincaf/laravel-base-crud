@extends('layouts.main')

@section('title', 'Create new comic')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row justify-content-center">
            <div class="col-10">
                <form action="{{ route('works.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    @include('works.includes.form')
                </form>
            </div>
        </div>
    </div>
@endsection
