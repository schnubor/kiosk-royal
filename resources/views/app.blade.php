<html>
    <head>
        @include('partials/head')
    </head>
    <body>
        {{-- Flash message --}}
        @include('flash::message')
        
        {{-- Content --}}
        @yield('content')

        {{-- Scripts --}}
        <script src="/js/all.js"></script>
        @yield('scripts')
    </body>
</html>
