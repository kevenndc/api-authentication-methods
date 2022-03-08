<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('components.head')
    <main class="mx-auto max-w-xl pt-8">
        @yield('content')
    </main>
</html>

