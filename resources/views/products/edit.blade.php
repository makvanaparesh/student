<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-warning">
            <h4>Edit Product</h4>
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

            <form action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" name="name"
                           class="form-control" value="{{ old('name',$product->name) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" name="price"
                           class="form-control" value="{{ old('price',$product->price) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input type="number" name="quantity"
                           class="form-control" value="{{ old('quantity',$product->quantity) }}">
                </div>
                <button type="submit" class="btn btn-success">
                    Update Product
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