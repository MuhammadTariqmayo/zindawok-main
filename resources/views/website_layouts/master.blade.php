<!DOCTYPE html>
<html lang="en">
    @include('website_layouts.partials._head')
<body>
    <div class="container min-vh-100 p-0">
        @include('website_layouts.partials._navbar')
        @yield('content')
        @include('website_layouts.partials._footer')
    </div>
    	@include('website_layouts.partials._script')
</body>
</html>