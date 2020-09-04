@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ __('Categories') }}</p>
            <a href="{{route('categories.create')}}" class="btn btn-primary">Add category</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($categories ?? null)
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <div class="d-flex">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-2">
                                Edit
                            </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionModal">
                                Delete
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center">No category registered</p>
        @endif
    </div>
</div>

<div class="modal fade" id="deletionModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>This action is irreversible, be careful...</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
