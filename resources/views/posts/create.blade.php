@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <h2 class="mb-0">Create New Post</h2>
    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Back to list</a>
  </div>

  <div class="card shadow-sm">
    <div class="card-body">
      <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" name="title" class="form-control" placeholder="Enter... " value="{{ old('title') }}">
          @error('title') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea name="content" class="form-control" rows="6" placeholder="Write your content here...">{{ old('content') }}</textarea>
          @error('content') <div class="small text-danger mt-1">{{ $message }}</div> @enderror
        </div>

        <div class="d-flex gap-2">
          <button type="submit" class="btn btn-success">Save</button>
          <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
