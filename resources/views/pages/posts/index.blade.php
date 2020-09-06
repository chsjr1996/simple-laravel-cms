@extends('layouts.app')

@include('components.modals.exclusion-modal')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ __('Posts') }}</p>
            <div>
                <a href="{{route('posts.create')}}" class="btn btn-primary">{{ __('Add post') }}</a>
                <a href="{{route('posts.trashed')}}" class="btn btn-danger">
                    <div>
                        {{ __('Trashed posts') }}
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if ($posts && count($posts) > 0 ?? null)
            <table class="table">
                <thead>
                    <th>{{ __('Image') }}</th>
                    <th colspan="2">{{ __('Title') }}</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ __('Post') }} - {{ $post->title }} {{ __('image') }}" width="120px" height="60px" />
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                                <button type="button" class="btn btn-danger" onclick="openExclusionModal('{{ route('posts.destroy', $post->id) }}')" data-toggle="modal" data-target="#deletionModal">
                                    {{ __('Delete') }}
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center m-0">{{ __('No posts registered') }}</p>
        @endif
    </div>
</div>

@endsection
