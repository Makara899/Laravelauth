@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    /* រក្សាទុក Style របស់អ្នកដដែល */
    body { font-family: 'Poppins', sans-serif; background-color: #f3f4f6; }
    .page-header { background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%); color: white; padding: 40px 0; margin-bottom: -30px; border-radius: 0 0 20px 20px; }
    .custom-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden; }
    .table thead th { background-color: #f8f9fa; color: #6c757d; font-weight: 600; text-transform: uppercase; font-size: 0.85rem; border-bottom: 2px solid #e9ecef; padding: 15px; }
    .table tbody td { padding: 15px; vertical-align: middle; color: #333; }
    .table-hover tbody tr:hover { background-color: #f9fafb; transform: scale(1.002); transition: all 0.2s ease; }
    .btn-action { width: 35px; height: 35px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin: 0 2px; transition: all 0.3s ease; border: none; }
    .btn-action:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
    .btn-view { background-color: #e0f2fe; color: #0ea5e9; }
    .btn-edit { background-color: #fef3c7; color: #d97706; }
    .btn-delete { background-color: #fee2e2; color: #ef4444; }
    .btn-add-new { background: white; color: #4f46e5; border: none; font-weight: 600; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); transition: all 0.3s; }
    .btn-add-new:hover { background: #f8f9fa; transform: translateY(-2px); }
    .category-img { width: 50px; height: 50px; object-fit: cover; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #6366f1 !important; color: white !important; border: none !important; border-radius: 50%; }
</style>

<div class="page-header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <h2 class="mb-1 fw-bold"><i class="fas fa-tags me-2"></i>Category Management</h2>
                <p class="mb-0 opacity-75">Organize your content with categories</p>
            </div>
            <a href="{{ route('categories.create') }}" class="btn btn-add-new px-4 py-2 rounded-pill">
                <i class="fas fa-plus me-2"></i>New Category
            </a>
        </div>
    </div>
</div>

<div class="container mt-5">

    @if(session('success'))
        <div id="auto-close-alert" class="alert alert-success border-0 shadow-sm d-flex align-items-center rounded-3 mb-4" role="alert" style="background-color: #d1fae5; color: #065f46;">
            <i class="fas fa-check-circle me-2 fs-5"></i>
            <div>{{ session('success') }}</div>
        </div>
        <script>
            setTimeout(() => {
                const alert = document.getElementById('auto-close-alert');
                if (alert) {
                    alert.style.transition = "opacity 0.5s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 500);
                }
            }, 3000);
        </script>
    @endif

    @if($categories->isEmpty())
        <div class="card custom-card text-center py-5">
            <div class="card-body">
                <div class="mb-3">
                    <i class="fas fa-folder-open fa-4x text-muted opacity-25"></i>
                </div>
                <h4 class="fw-bold text-secondary">No Categories Found</h4>
                <p class="text-muted mb-4">It looks like you haven't created any categories yet.</p>
                <a href="{{ route('categories.create') }}" class="btn btn-primary px-4 rounded-pill">
                    <i class="fas fa-plus me-2"></i>Create First Category
                </a>
            </div>
        </div>
    @else
        <div class="card custom-card">
            <div class="card-body p-4">
                <div class="table-responsive">
                    <table id="categoriesTable" class="table table-hover mb-0 align-middle">
                        <thead>
                            <tr>
                                <th style="width: 10%">Image</th>
                                <th style="width: 20%">Name</th>
                                <th style="width: 20%">Slug</th>
                                <th>Description</th>
                                <th style="width: 15%" class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>
                                        @if($category->image)
                                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" class="category-img">
                                        @else
                                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-secondary" style="width: 50px; height: 50px;">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </td>

                                    <td>
                                        <span class="fw-semibold text-dark">{{ $category->name }}</span>
                                    </td>

                                    <td>
                                        <span class="badge bg-light text-secondary border fw-normal font-monospace">
                                            {{ $category->slug }}
                                        </span>
                                    </td>

                                    <td class="text-muted">
                                        <div class="text-truncate" style="max-width: 300px;">
                                            {{ Str::limit($category->description, 60) ?? 'No description' }}
                                        </div>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('categories.show', $category) }}" class="btn-action btn-view" title="View Details">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('categories.edit', $category) }}" class="btn-action btn-edit" title="Edit Category">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you surely want to delete this category?')">
                                            @csrf @method('DELETE')
                                            <button class="btn-action btn-delete" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>

@push('styles')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#categoriesTable').DataTable({
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50],
        order: [[1, 'asc']], // តម្រៀបតាមឈ្មោះ (Name) ជាលំនាំដើម
        // បិទការតម្រៀបសម្រាប់ Image (0) និង Actions (4)
        columnDefs: [{ orderable: false, targets: [0, 4] }],
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search categories...",
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        },
        dom: '<"d-flex justify-content-between align-items-center mb-3"lf>rt<"d-flex justify-content-between align-items-center mt-3"ip>'
      });
    });
  </script>
@endpush

@endsection
