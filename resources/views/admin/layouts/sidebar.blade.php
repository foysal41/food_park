<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>



                {{-- এই code টুকু  view>layout>navigation থেকে নেয়া হয়েছে --}}

                {{--
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
--}}



                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>


            </div>
        </li>
    </ul>
</nav>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Foysal Jaman</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class=active><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    General Dashboard</a>
            </li>
            <li class="menu-header">Starter</li>

            {{-- 1. আমি স্লাইডারের জন্য একটি কন্ট্রোলার, মাইগ্রেশন এবং মডেল তৈরি করব। চলো কোডে যাই এবং টার্মিনাল ওপেন করি। artisan make:controller Admin/SliderController -r and php artisan make:model Slider -m

                2. route > admin.php add slider resource route. press ctrl + shift + p > artisan Route List > search list of slider routes (artisan extension ).

                3. slider নামে একটা ফোল্ডার তৈরি হবে। এখানে slider এর view তা  show করবো admin>slider>index.blade.php

                4. Now goto slider controller | then index()->return admin.slider.index

                5. index এ কিছু content দিয়ে slider display করলাম।
                --}}

            <li><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="far fa-square"></i>
                    <span>Slider</span></a></li>

            <li><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}"><i class="far fa-square"></i>
                    <span>Why Choose Us</span></a></li>

            <li class="dropdown">
                <a href="#" class="has-dropdown nav-link"><i class="far fa-square"></i> <span>Manage Resturnat</span></a>

                <ul class="dropdown-menu">
                    <li> <a href="{{ route('admin.product.index') }}" class="nav-link">All Products</a> </li>
                    <li> <a href="{{ route('admin.category.index') }}" class="nav-link">Product Category</a> </li>

                </ul>

            </li>


            {{--
                 <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('admin.category.index') }}" class="nav-link">Prodcut Category</a>
                    </li>
                </ul>

            </li>


        --}}



        </ul>

    </aside>
</div>
