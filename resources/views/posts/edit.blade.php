@extends('master')

@section('title', 'Edit Post')

@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    @if (session('successMessage'))
                        <div class="alert alert-success text-center">
                            {{ session('successMessage') }}
                        </div>
                    @endif
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-success mb-3">{{ $post->name }}</a>
                    <form action="{{ route('post.update', $post->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Post Name</label>
                            <input id="name" name="name" type="text" class="form-control" placeholder="Post Title" value="{{ old('name', $post->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="categoty">Category</label>
                            <input type="text" name="category" id="category" class="form-control" placeholder="Post Category" value="{{ old('category', $post->category) }}">
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control">{{ old('description', $post->description) }}</textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="enable"{{ (old('status', $post->status) == 'enable') ? 'selected = selected':'' }}>Enable</option>
                                <option value="disable"{{ (old('status', $post->status) == 'disable') ? 'selected = selected':'' }}>Disable</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
