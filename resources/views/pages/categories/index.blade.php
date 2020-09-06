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
            <table class="table">
                <thead>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Posts count') }}</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->posts->count() }}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary mr-2">
                                    {{ __('Edit') }}
                                </a>
                                <button type="button" class="btn btn-danger" onclick="openExclusionModal('{{ route('categories.destroy', $category->id) }}')" data-toggle="modal" data-target="#deletionModal">
                                    {{ __('Delete') }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center m-0">{{ __('No category registered') }}</p>
        @endif
    </div>
</div>
@endsection
