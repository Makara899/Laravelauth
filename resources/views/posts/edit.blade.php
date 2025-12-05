@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h2 class="mb-0">Edit Post</h2>
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to list</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $post->title) }}">
        </div>

        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea name="content" class="form-control" rows="6">{{ old('content', $post->content) }}</textarea>
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
