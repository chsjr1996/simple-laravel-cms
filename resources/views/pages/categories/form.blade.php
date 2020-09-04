@extends('layouts.app')

@php
    $isNew = isset($category) ? false : true;
    $name = isset($category) ? $category->name : '';
    $action = $isNew ? route('categories.store') : route('categories.update', $category->id);
@endphp

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="m-0">{{ __('New category') }}</p>
                    </div>
                </div>

                <form action="{{ $action }}" method="POST">
                    @csrf
                    @if (!$isNew)
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter with the category name" value="{{ $name }}" />
                            @if ($errors->has('name'))
                                @foreach ($errors->all() as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            {{ $isNew ? 'Create' : 'Update' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
