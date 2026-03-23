<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Product List</h1>

    <form action="{{ route('product.create') }}" method="get">
        <button type="submit">Add New Product</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        @forelse($products as $product)

        <tr>
            <td>{{$product->product_id}}</td>
            <td>{{$product->code}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->quantity}}</td>
            <td>{{$product->price}}</td>
        </tr>
    <br>

    </table>
    @empty
    <p>Table is Empty</p>
    @endforelse
</body>
</html>