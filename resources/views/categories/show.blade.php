@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .page-header { background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 40px 0; margin-bottom: -30px; border-radius: 0 0 20px 20px; }
    .custom-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
    .detail-label { font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; color: #6b7280; font-weight: 600; }
    .detail-value { font-size: 1.1rem; color: #1f2937; font-weight: 500; }
    .show-img { width: 100%; height: 300px; object-fit: cover; border-radius: 10px; }
    .placeholder-img { height: 300px; background-color: #f3f4f6; display: flex; align-items: center; justify-content: center; border-radius: 10px; color: #9ca3af; font-size: 3rem; }
</style>

<div class="page-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="mb-1 fw-bold"><i class="fas fa-info-circle me-2"></i>Category Details</h2>
                <p class="mb-0 opacity-75">Viewing details for: <strong>{{ $category->name }}</strong></p>
            </div>
            <a href="{{ route('categories.index') }}" class="btn btn-light text-primary px-4 py-2 rounded-pill fw-bold">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card custom-card">
                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-md-5">
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="show-img shadow-sm">
                            @else
                                <div class="placeholder-img shadow-sm">
                                    <i class="fas fa-image"></i>
                                </div>
                            @endif
                        </div>

                        <div class="col-md-7">
                            <div class="mb-4">
                                <div class="detail-label mb-1">Category Name</div>
                                <div class="detail-value">{{ $category->name }}</div>
                            </div>

                            <div class="mb-4">
                                <div class="detail-label mb-1">Slug</div>
                                <div class="d-inline-block bg-light px-3 py-1 rounded border font-monospace text-secondary">
                                    {{ $category->slug }}
                                </div>
                            </div>

                            <div class="mb-4">
                                <div class="detail-label mb-1">Description</div>
                                <div class="detail-value text-muted" style="line-height: 1.6;">
                                    {{ $category->description ?? 'No description provided.' }}
                                </div>
                            </div>

                            <hr class="my-4" style="opacity: 0.1;">

                            <div class="row">
                                <div class="col-6">
                                    <div class="detail-label mb-1">Created At</div>
                                    <div class="small text-secondary"><i class="far fa-calendar-alt me-2"></i>{{ $category->created_at->format('F d, Y h:i A') }}</div>
                                </div>
                                <div class="col-6">
                                    <div class="detail-label mb-1">Last Updated</div>
                                    <div class="small text-secondary"><i class="fas fa-history me-2"></i>{{ $category->updated_at->format('F d, Y h:i A') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light p-3 border-0 d-flex justify-content-end gap-2">
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning text-white rounded-pill px-4">
                        <i class="fas fa-pen me-2"></i>Edit
                    </a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category permanently?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger rounded-pill px-4">
                            <i class="fas fa-trash me-2"></i>Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
