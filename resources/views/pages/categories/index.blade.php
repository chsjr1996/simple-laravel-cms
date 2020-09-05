@extends('layouts.app')

@include('components.modals.exclusion-modal')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ __('Categories') }}</p>
            <a href="{{route('categories.create')}}" class="btn btn-primary">{{ __('Add category') }}</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($categories && count($categories) > 0 ?? null)
            <ul class="list-group">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $category->name }}
                        <div class="d-flex">
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-2">
                                {{ __('Edit') }}
                            </a>
                            <button type="button" class="btn btn-danger" onclick="openExclusionModal('{{ route('categories.destroy', $category->id) }}')" data-toggle="modal" data-target="#deletionModal">
                                {{ __('Delete') }}
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-center m-0">{{ __('No category registered') }}</p>
        @endif
    </div>
</div>
@endsection
