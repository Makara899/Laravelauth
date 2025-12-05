@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .page-header { background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 40px 0; margin-bottom: -30px; border-radius: 0 0 20px 20px; }
    .custom-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
    .form-label { font-weight: 500; color: #4b5563; }
    .form-control:focus { border-color: #a855f7; box-shadow: 0 0 0 0.25rem rgba(168, 85, 247, 0.25); }
</style>

<div class="page-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="mb-1 fw-bold"><i class="fas fa-plus-circle me-2"></i>Create Category</h2>
                <p class="mb-0 opacity-75">Add a new category to your system</p>
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
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g., Technology">
                                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required readonly style="background-color: #f9fafb;">
                                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Cover Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            <div class="form-text text-muted">Recommended size: 500x500px (Max: 2MB)</div>
                            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Write a short description...">{{ old('description') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary py-2 fw-bold rounded-pill" style="background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); border: none;">
                                <i class="fas fa-save me-2"></i>Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Auto-generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        let slug = this.value.toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
        document.getElementById('slug').value = slug;
    });
</script>
@endsection
