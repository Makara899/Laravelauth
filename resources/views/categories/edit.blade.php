@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .page-header { background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 40px 0; margin-bottom: -30px; border-radius: 0 0 20px 20px; }
    .custom-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .form-label { font-weight: 500; color: #4b5563; }
    .preview-img { width: 100px; height: 100px; object-fit: cover; border-radius: 10px; border: 2px solid #e5e7eb; }
</style>

<div class="page-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="mb-1 fw-bold"><i class="fas fa-edit me-2"></i>Edit Category</h2>
                <p class="mb-0 opacity-75">Update category information</p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-light text-primary px-4 py-2 rounded-pill fw-bold">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card">
                <div class="card-body p-4">
                    <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $category->slug) }}" required readonly style="background-color: #f9fafb;">
                                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Cover Image</label>
                            <div class="d-flex align-items-center">
                                @if($category->image)
                                    <div class="me-3">
                                        <img src="{{ asset('storage/' . $category->image) }}" alt="Current Image" class="preview-img">
                                    </div>
                                @endif
                                <div class="flex-grow-1">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    <div class="form-text text-muted">Leave blank to keep current image.</div>
                                </div>
                            </div>
                            @error('image') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning py-2 fw-bold rounded-pill text-white" style="background-color: #f59e0b; border: none;">
                                <i class="fas fa-sync-alt me-2"></i>Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('name').addEventListener('input', function() {
        let slug = this.value.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
