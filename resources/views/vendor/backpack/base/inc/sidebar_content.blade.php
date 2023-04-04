{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="{{ backpack_url('dashboard') }}"><i class="la la la-gittip nav-icon"></i> PROJECT CRUD </a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-question"></i> Users</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('categories') }}"><i class="nav-icon la la-question"></i> Categories</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('posts') }}"><i class="nav-icon la la-question"></i> Posts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('tags') }}"><i class="nav-icon la la-question"></i> Tags</a></li>
    </ul>
</li>

{{-- <li class="nav-item"><a class="nav-link" href="{{ backpack_url('products') }}"><i class="nav-icon la la-question"></i> Products</a></li> --}}




