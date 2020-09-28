@extends('layouts.app')

@include('common.modals.exclusion-modal')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ __('Tags') }}</p>
            <a href="{{route('tags.create')}}" class="btn btn-primary">{{ __('Add category') }}</a>
        </div>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($tags && count($tags) > 0 ?? null)
            <table class="table">
                <thead>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Posts count') }}</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td>{{ $tag->name }}</td>
                            {{-- <td>{{ $tag->posts->count() }}</td> --}}
                            <td>0</td>
                            <td>
                                <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary mr-2">
                                    {{ __('Edit') }}
                                </a>
                                <button type="button" class="btn btn-danger" onclick="openExclusionModal('{{ route('tags.destroy', $tag->id) }}')" data-toggle="modal" data-target="#deletionModal">
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
