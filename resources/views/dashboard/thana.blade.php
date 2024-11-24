<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thana Dashboard</title>

    @vite('resources/sass/app.scss')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="{{ asset('css/ward/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ward/responsive.css') }}">

    {{--------- report formate ---------}}
    {{-- <link rel="stylesheet" href="{{ asset('css/unit/default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/unit/unit_report_upload.css') }}"> --}}
    {{--------- report formate ---------}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" ></script>
    <script>
        window.modal = bootstrap.Modal;
    </script>

    <script src="/js/sweat_alert.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" ></script>
    @vite('resources/js/report_management/ward/main.js')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener("mouseenter", Swal.stopTimer);
                toast.addEventListener("mouseleave", Swal.resumeTimer);
            },
        });
        window.toaster = function toaster(message = "success", icon = "success") {
            Toast.fire({
                icon: icon,
                title: message,
            });
        };
    </script>
</head>

<body>
    <div>
        <div id="app">
            <app></app>
        </div>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>

</html>
