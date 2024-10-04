<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as a Job Applicant</title>
    <!-- Link to Bootstrap CSS; adjust according to your directory structure -->
    <link href="{{ asset('mazer/assets/css/bootstrap.css') }}" rel="stylesheet">
    <!-- Link to Mazer CSS -->
    <link href="{{ asset('mazer/assets/css/mazer.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register as a Job Applicant</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Education</label>
                            <input type="text" class="form-control" name="last_education" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Work History</label>
                            <textarea class="form-control" name="work_history" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Photo</label>
                            <input type="file" class="form-control" name="photo" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload CV</label>
                            <input type="file" class="form-control" name="cv" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="{{ asset('mazer/assets/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
