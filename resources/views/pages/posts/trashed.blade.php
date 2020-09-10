@extends('layouts.app')

@include('common.modals.exclusion-modal')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ __('Trashed posts') }}</p>
            <div>
                <a href="{{route('posts.index')}}" class="btn btn-primary">{{ __('Return to posts list') }}</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        @if ($posts && count($posts) > 0 ?? null)
            <table class="table">
                <thead>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Image') }}</th>
                    <th colspan="2">{{ __('Title') }}</th>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                {{ $post->id }}
                            </td>
                            <td>
                                <img src="{{ asset('storage/'.$post->image) }}" alt="{{ __('Post') }} - {{ $post->title }} {{ __('image') }}" width="120px" height="60px" />
                            </td>
                            <td>
                                {{ $post->title }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('posts.restore', $post->id) }}" class="btn btn-success">
                                    {{ __('Restore') }}
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
            <p class="text-center m-0">{{ __('Trash is empty') }}</p>
        @endif
    </div>
</div>
@endsection
