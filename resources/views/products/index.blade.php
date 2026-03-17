<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Product</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src='main.js'></script>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h2 class="">Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        </div>
        <table class="mt-3 table table-striped table-borderd">
            <thead>
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Price</td>
                    <td>Quantity</td>
                </tr>
            </thead>
            <tbody>
                
                    @foreach ($products as $product)
                    <tr>
                    <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>