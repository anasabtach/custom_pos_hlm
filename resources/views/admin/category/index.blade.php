@extends('admin.partials.master')
@section('style')
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="{{ asset('assets/admin/css/menu.css') }}" rel="stylesheet">

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <form action="{{ route('admin.categories.store') }}" class="form-horizontal form-material" method="POST" id="category_form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="col-md-12">Category Name</label>
                            <div class="col-md-12">
                                <input type="text" placeholder="Category Name" class="form-control form-control-line" name="name"> 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            @include('admin.components.button', ['class'=> 'btn-success', 'type'=>'submit', 'name'=>'Add'])
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                <div class="menu-box">
                    <ul class="menu-list sortable">
                        @foreach($categories as $category)
                            <li data-id="{{ $category->id }}">
                                <a href="javascript:void(0)">{{ $category->name }}</a>
                                @if($category->subCategories->isNotEmpty())
                                    <ul class="submenu-list" data-parent="{{ $category->id }}">
                                        @include('admin.partials.menu', ['categories' => $category->subCategories])
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let update_list = "{{ route('admin.categories.update_list') }}"
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://ilikenwf.github.io/jquery.mjs.nestedSortable.js"></script>
    <script src="{{ asset('assets/admin/validation/category.js') }}"></script>
    <script src="{{ asset('assets/admin/js/menu.js') }}"></script>
@endsection