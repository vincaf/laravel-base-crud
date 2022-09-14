@extends('layouts.main')

@section('title', 'Comics')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Thumb</th>
                            <th scope="col">Series</th>
                            <th scope="col">Sale_date</th>
                            <th scope="col">Type</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($works as $work)
                            <tr>
                                <th scope="row">{{ $work->id }}</th>
                                <td>{{ $work->title }}</td>
                                <td>{{ $work->description }}</td>
                                <td> <img src="{{ $work->thumb }}" alt="{{ $work->title }}"></td>
                                <td>{{ $work->series }}</td>
                                <td>{{ $work->sale_date }}</td>
                                <td>{{ $work->type }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="1">There are no comics available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
