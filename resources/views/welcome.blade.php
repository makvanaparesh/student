<!DOCTYPE html>
<html>
<head>
    <title>Student Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h2>Welcome</h2>
            </div>
            <div class="card-body">
                <h3 class="mb-3">Welcome to My Student Project</h3>
                <p class="lead">
                    This project is developed using Laravel CRUD Operations.
                </p>
                <p>
                    In this project you can Create, Read, Update and Delete products.
                </p>
                <hr>
                <a href="{{ route('products.index') }}" class="btn btn-success btn-lg">
                    Go to CRUD Operation
                </a>
            </div>
            <div class="card-footer text-muted">
                Student Laravel Project
            </div>
        </div>
    </div>
</body>
</html>