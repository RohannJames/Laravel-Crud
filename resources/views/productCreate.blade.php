<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Create Product</h1>

    <form action="{{route('product.store')}}" method="post">
        @csrf
        Code
        <input type="text" name="code"> <br>
        Name
        <input type="text" name="name"> <br>
        Quantity
        <input type="number" name="quantity"> <br>
        Price
        <input type="number" name="price"> <br>
        Description
        <input type="textarea" name="description"> <br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>