@extends('master')

@section('title', 'New Post')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <a href="{{ route('post.index') }}" class="btn btn-success mb-3">All Post</a>
                    <form action="{{ route('post.store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="name">Post Name</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Post Title" value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoty">Category</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Post Category" value="{{ old('category') }}">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
