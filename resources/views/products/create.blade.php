<!DOCTYPE html>
<html>
<head>
    <title>Create Product</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4>Create Product</h4>
        </div>

        <div class="card-body">

            <!-- Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('products.store') }}" method="POST">
            @csrf

                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" 
                           name="name" 
                           class="form-control"
                           value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" 
                           name="price" 
                           class="form-control"
                           value="{{ old('price') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" 
                           name="quantity" 
                           class="form-control"
                           value="{{ old('quantity') }}">
                </div>

                <button type="submit" class="btn btn-success">
                    Save Product
                </button>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Back
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>