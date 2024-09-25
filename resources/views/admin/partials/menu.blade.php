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
