@extends('layouts.app')

@php
    $isNew = isset($post) ? false : true;
    $title = isset($post) ? $post->title : '';
    $description = isset($post) ? $post->description : '';
    $content = isset($post) ? $post->content : '';
    $publishedAt = isset($post) ? $post->published_at : '';
    $action = $isNew ? route('posts.store') : route('posts.update', $post->id);
@endphp

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ $isNew ? __('New post') : __('Update post') }}</p>
        </div>
    </div>

    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (!$isNew)
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('Title') }}</label>
                <input type="text" id="title" name="title" class="form-control cm-js-focus" placeholder="{{ __('Enter with the post title') }}" value="{{ $title }}" />
                <x-field-validation-error :field="'title'" />
            </div>

            <div class="form-group">
                <label for="title">{{ __('Description') }}</label>
                <textarea id="description" name="description" class="form-control" rows="5" placeholder="{{ __('Enter with the post description') }}">{{ $description }}</textarea>
                <x-field-validation-error :field="'description'" />
            </div>

            <div class="form-group">
                <label for="content">{{ __('Content') }}</label>
                <textarea id="content" name="content" class="form-control" rows="5" placeholder="{{ __('Enter with the post content') }}">{{ $content }}</textarea>
                <x-field-validation-error :field="'content'" />
            </div>

            <div class="form-group">
                <label for="published_at">{{ __('Published At') }}</label>
                <input type="text" id="published_at" name="published_at" class="form-control" placeholder="{{ __('Enter with the post published at') }}" value="{{ $publishedAt }}" />
            </div>

            <div class="form-group">
                <label for="image">{{ __('Image') }}</label>
                <input type="file" id="image" name="image" class="form-control" />
                <x-field-validation-error :field="'image'" />
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success">
                {{ $isNew ? __('Create') : __('Update') }}
            </button>
        </div>
    </form>
</div>
@endsection
