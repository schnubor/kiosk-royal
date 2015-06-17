<html>
    <head>
        @include('partials/head')
    </head>
    <body>
              
        {{-- Content --}}
        @yield('content')

        {{-- Scripts --}}
        <script src="/js/all.js"></script>
        @yield('scripts')
    </body>
</html>
