@extends('layouts.main')

@section('title', $work->title)

@section('main-content')
    <div class="container my-5 py-2">
        <div class="row">
            @if (session('edited'))
                <div class="alert alert-success">
                    {{ session('edited') }} è stato modificato con successo.
                </div>
            @endif
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
                <div class="form-group p-3 d-flex justify-content-center">
                    <a href="{{ route('works.edit', $work->slug) }}" class="btn btn-sm btn-success mx-1">
                        Edit comic
                    </a>
                    <form action="{{ route('works.destroy', $work->id) }}" method="POST" class="form-work-delete" data-work-name="{{ $work->title }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-sm btn-danger mx-1">
                            Delete comic
                        </button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    {{ $work->sale_date }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer-scripts')
    <script>
        const deleteFormElements = document.querySelectorAll('.form-work-delete');
        deleteFormElements.forEach(
            formElement => {
                formElement.addEventListener('submit', function(event){
                    const name = this.getAttribute('data-work-name');
                    event.preventDefault();
                    const result = window.confirm(`Are you sure you want to delete "${name}"?`);
                    if(result) this.submit();
                })
            }
        )
    </script>
@endsection
