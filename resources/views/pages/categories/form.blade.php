@extends('layouts.app')

@php
    $isNew = isset($category) ? false : true;
    $name = isset($category) ? $category->name : '';
    $action = $isNew ? route('categories.store') : route('categories.update', $category->id);
@endphp

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <p class="m-0">{{ $isNew ? __('New category') : __('Update category') }}</p>
        </div>
    </div>

    <form action="{{ $action }}" method="POST">
        @csrf
        @if (!$isNew)
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" id="name" name="name" class="form-control cm-js-focus" placeholder="{{ __('Enter with the category name') }}" value="{{ $name }}" />
                <x-field-validation-error :field="'name'" />
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
