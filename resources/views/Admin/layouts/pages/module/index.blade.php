@extends('Admin.layouts.master')

@push('admin_style')
@endpush

@section('page_title')
Module Index
@endsection

@section('admin_content')
<div class="row">
    <div class="col">
    <div class="card">
        <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-header">Module</h5>
        <a class="btn btn-primary me-4" href="{{ route('module.create') }}">Add new</a>
    </div>
            <div class="table-responsive text-nowrap">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Module Name</th>
                    <th>Module Slug</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($modules as $module)
                    <tr>
                        <td><strong>{{ $loop->index+1 }}</strong></td>
                        <td>{{ $module->module_name }}</td>
                        <td>{{ $module->module_slug }}</td>
                        <td>{{ $module->updated_at->format('(D)-d-M-Y') }}</td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{ route('module.edit',$module->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    @empty

                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
    </div>
</div>
@endsection


@push('admin_script')
@endpush
