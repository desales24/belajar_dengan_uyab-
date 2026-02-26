<!doctype html>
<html lang="en">

    @include('includes.head')
    
    <body>

        @include('includes.section')

        @include('includes.navbar')

        <main>

            @yield('content')

        </main>

        @include('includes.footer')

        @include('includes.script')

    </body>
</html>