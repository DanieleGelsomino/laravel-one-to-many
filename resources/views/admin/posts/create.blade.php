@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Crea nuovo post</h1>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror"
                    id="title" name="title">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <select class="mb-2 form-select @error('category_id') is-invalid @enderror" name="category_id">
                <option selected>Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            <div class="mb-3">
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
                    rows="3">{{ old('content') }}</textarea>

                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i></button>
            <button type="reset" class="btn btn-secondary"><i class="fa-solid fa-eraser"></i></button>
            <a class="btn btn-dark" href="{{ route('admin.posts.index') }}"><i class="fa-solid fa-arrow-left"></i></a>
        </form>

    </div>
@endsection
