<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.http')
        @yield('title')
    </head>
    <body>
        @if( $flash = session('response'))
          <div id="flash-message" class="alert alert-success">
              {{ $flash }}
          </div>
        @endif

        @include('layouts.nav')
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')

                    <nav class="blog-pagination">
                        <a class="btn btn-outline-primary" href="#">Older</a>
                        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                    </nav>
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('layouts.sidebar')
                </div>
            </div>
        </div>
        <div class="blog-footer">
            @include('layouts.footer')
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>