<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pduli ID</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('home.cssload')
    <style>
        .square-button {
            border-radius: 0;
        }

        /* Scrollbar styling for Chrome, Safari, and Edge */
        ::-webkit-scrollbar {
            width: 20px;
            /* Width of the scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Background of the scrollbar track */
        }

        ::-webkit-scrollbar-thumb {
            background-color: gold;
            /* Color of the scrollbar thumb */
            border-radius: 10px;
            /* Rounded corners of the scrollbar thumb */
            border: 3px solid #f1f1f1;
            /* Space around the scrollbar thumb */
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Color when hovering over the scrollbar thumb */
        }

        /* Scrollbar styling for Firefox */
        body {
            scrollbar-width: thin;
            /* Width of the scrollbar */
            scrollbar-color: #888 #f1f1f1;
            /* Color of the scrollbar thumb and track */
        }

        @media (max-width: 768px) {
            .navbar {
                background-color: rgb(88, 87, 87) !important;
                color: black;
            }
        }
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
    <div class="py-1 bg-black top">
        <div class="container">
            @include('home.header')
        </div>
    </div>
    @include('sweetalert::alert')
    <!-- Navbar Section -->
    @include('home.navbar')

    @include('home.heroparalax')

    @include('home.about')


    @include('home.services')

    @include('home.section')

    @include('home.docter')

    @include('home.funfact')

    @include('home.artikel')

    @include('home.testimoni')

    @include('home.contact')

    @include('home.footer')



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    @include('home.js')
</body>

</html>
