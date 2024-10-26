<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MDB UI KIT CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet" />

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        body {
            font-family: 'Jost', sans-serif;
            background: linear-gradient(to bottom, #0f0c29, #302b63, #24243e);
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <!-- Login Form -->
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="email" id="form1Example13" name="email"
                                class="form-control form-control-lg" placeholder="Email address" required />
                            <label class="form-label" for="form1Example13" style="color: white;">Email address</label>
                        </div>

                        <div data-mdb-input-init class="form-outline mb-4">
                            <input type="password" id="form1Example23" name="password"
                                class="form-control form-control-lg" placeholder="Password" required />
                            <label class="form-label" for="form1Example23" style="color: white;">Password</label>
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="form1Example3"
                                    checked />
                                <label class="form-check-label" for="form1Example3" style="color: white;"> Remember me
                                </label>
                            </div>
                            <a href="#!" style="color: white;">Forgot password?</a>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>

                        <div class="divider d-flex align-items-center my-4" style="color: white;">
                            <p class="text-center fw-bold mx-3 mb-0 text-muted" style="color: white;">Belum punya akun?</p>
                        </div>

                        <a class="btn btn-primary btn-lg btn-block" href="{{ url('register') }}" role="button">
                            Buat Akun
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- MDB UI KIT JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js"></script>

    <!-- Optional SweetAlert for success message -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                title: "Good job!",
                text: "{{ session('success') }}",
                icon: "success"
            });
        @endif
    </script>
</body>

</html>
