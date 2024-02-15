<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ asset('/dist/css/tabler.min.css') }}" rel="stylesheet"> <!-- Perbaikan typo di sini -->
    <link href="{{ asset('/dist/css/demo.min.css') }}" rel="stylesheet"> <!-- Perbaikan typo di sini -->
    <style>
        @import url('https://rsms.me/inter/inter.css');

    

        :root {
            --tblr-font-sans-serif: 'Inter Var', -aplle-system, BlinkMacSystemFont, San Francisco, segoe UI, Roboto, Helvetica Neue, Sans-serif
        }
        body {
            font-feature-settings: "cv03","cv04","cv11"
        }
        
    </style>
</head>
<body>
    <div class="container"> <!-- Perbaikan typo dan penambahan spasi di sini -->
        @include('include.sidebar')
        <div class="page-wrapper">

            @yield('konten')
        </div>

        
        {{-- @include('include.footer') --}}
    </div>
    <script src="{{ ("/dist/js/tabler.min.js") }}" defer></script>
    <script src="{{ ("/dist/js/demo.min.js") }}" defer></script>
</body>

</html>
