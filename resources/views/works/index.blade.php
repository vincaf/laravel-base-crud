@extends('layouts.main')

@section('title', 'List')

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            <div class="col-12">
                @if ( session('delete'))
                    <div class="alert alert-warning">
                        {{ session('delete') }} è stato rimosso con successo.
                    </div>
                @endif
                @if ( session('created'))
                    <div class="alert alert-success">
                        {{ session('created') }} è stato creato con successo.
                    </div>
                @endif
                <table class="table table-light table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Thumb</th>
                            <th scope="col">Series</th>
                            <th scope="col">Sale_date</th>
                            <th scope="col">Type</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($works as $work)
                            <tr>
                                <th scope="row">{{ $work->id }}</th>
                                <td>
                                    <a href="{{ route('works.show', $work->slug) }}">{{ $work->title }}</a>
                                </td>
                                <td>{{ $work->description }}</td>
                                <td>
                                    <a href="{{ route('works.show', $work->slug) }}"> 
                                        <img src="{{ $work->thumb }}" alt="{{ $work->title }}"></td>
                                    </a>
                                <td>{{ $work->series }}</td>
                                <td>{{ $work->sale_date }}</td>
                                <td>{{ $work->type }}</td>
                                <td>
                                    <a href="{{ route('works.edit', $work->slug) }}" class="btn btn-sm btn-success">Edit</a>

                                    <form action="{{ route('works.destroy', $work->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger my-2">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">There are no comics available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
