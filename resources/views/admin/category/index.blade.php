@extends('admin.partials.master')
@section('content')
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container-fluid">
            @can('add-category')
            <div class="row">
                <div class="col-lg-12 col-xl-12 px-4">
                    <div class="card card-custom gutter-b bg-white border-0">
                        <div class="card-header border-0 align-items-center">
                            <h3 class="card-label mb-0 font-weight-bold text-body">
                                {{ isset($is_update) ? 'Update' : 'Add' }} Category
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.categories.store') }}" method="POST" id="category_form">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label>Category</label>
                                        <fieldset class="form-group mb-3">
                                            <input type="text" placeholder="Enter category name"
                                                class="form-control round bg-transparent text-dark"
                                                value="{{ isset($is_update) ? $edit_category->name : old('category_name') }}"
                                                name="category_name" id="category_name">

                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" name="category_id"
                                        value="{{ isset($is_update) ? $edit_category->hashid : '' }}">
                                    <input type="submit" class="btn btn-primary mt-4"
                                        value="{{ isset($is_update) ? 'Update' : 'Add' }}">
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
            @endcan
            <div class="row">
                <div class="col-12 px-4">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 px-4">
                            <div class="card card-custom gutter-b bg-transparent shadow-none border-0">
                                <div class="card-header align-items-center  border-bottom-dark px-0">
                                    <div class="card-title mb-0">
                                        <h3 class="card-label mb-0 font-weight-bold text-body">Categories
                                        </h3>
                                    </div>
                                    <div class="icons d-flex">
                                        <button class="btn ms-2 p-0" id="kt_notes_panel_toggle" data-bs-toggle="tooltip"
                                            title="" data-bs-placement="right"
                                            data-original-title="Check out more demos">
                                            <span
                                                class="bg-secondary h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center  rounded-circle shadow-sm ">

                                                <svg width="25px" height="25px" viewBox="0 0 16 16"
                                                    class="bi bi-plus white" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                                </svg>
                                            </span>

                                        </button>
                                        {{-- <a href="#" onclick="printDiv()" class="ms-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-printer-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z" />
                                                    <path fill-rule="evenodd"
                                                        d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                                                </svg>
                                            </span>

                                        </a> --}}
                                        {{-- <a href="#" class="ms-2">
                                            <span
                                                class="icon h-30px font-size-h5 w-30px d-flex align-items-center justify-content-center rounded-circle ">
                                                <svg width="15px" height="15px" viewBox="0 0 16 16"
                                                    class="bi bi-file-earmark-text-fill" fill="currentColor"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7 2l.5-2.5 3 3L10 5a1 1 0 0 1-1-1zM4.5 8a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5z" />
                                                </svg>
                                            </span>

                                        </a> --}}

                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="row">

                        <div class="col-12  px-4">
                            <div class="card card-custom gutter-b bg-white border-0">
                                <div class="card-body">
                                    <div>
                                        <div class=" table-responsive" id="printableTable">
                                            <table id="myTable" class="display ">

                                                <thead class="text-body">
                                                    <tr>
                                                        <th class="text-center">ID</th>
                                                        <th class="text-center">Name</th>
                                                        <th class="text-center">Status</th>
                                                        <th class="no-sort text-end">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="kt-table-tbody text-dark">
                                                    @foreach ($categories as $category)
                                                        <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td class="text-center">
                                                                <p class="text-sm font-weight-bold mb-0">
                                                                    {{ $category->name }}</p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                @if ($category->status)
                                                                    active
                                                                    {{-- <span class="badge badge-sm bg-gradient-success">Active</span> --}}
                                                                @else
                                                                    {{-- <span class="badge badge-sm bg-gradient-secondary">Deactive</span> --}}
                                                                    deactive
                                                                @endif
                                                            </td>


                                                            <td>
                                                                <div class="card-toolbar text-end">
                                                                    <button class="btn p-0 shadow-none" type="button"
                                                                        id="dropdowneditButton01" data-bs-toggle="dropdown"
                                                                        aria-haspopup="true" aria-expanded="false">
                                                                        <span class="svg-icon">
                                                                            <svg width="20px" height="20px"
                                                                                viewBox="0 0 16 16"
                                                                                class="bi bi-three-dots text-body"
                                                                                fill="currentColor"
                                                                                xmlns="http://www.w3.org/2000/svg">
                                                                                <path fill-rule="evenodd"
                                                                                    d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                                                </path>
                                                                            </svg>
                                                                        </span>
                                                                    </button>
                                                                    <div class="dropdown-menu dropdown-menu-right"
                                                                        aria-labelledby="dropdowneditButton01"
                                                                        style="position: absolute; transform: translate3d(1001px, 111px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                                        @can('edit-category')
                                                                        <a href="{{ route('admin.categories.edit', ['category_id' => $category->hashid]) }}"
                                                                            class="dropdown-item click-edit"
                                                                            id="click-edit2" data-bs-toggle="tooltip"
                                                                            title="" data-bs-placement="right"
                                                                            data-original-title="Check out more demos">Edit</a>
                                                                        @endcan
                                                                        @can('delete-category')
                                                                        <a class="dropdown-item confirm-delete"
                                                                            title="Delete"
                                                                            href="{{ route('admin.categories.delete', ['category_id' => $category->hashid]) }}">Delete</a>
                                                                        @endcan
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('assets/validation/categories_validation.js') }}"></script>
@endsection