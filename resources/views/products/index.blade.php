<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Show Table</h1>
    <a href="/products/create">Add</a>
    <table border="1" style="">
        <tr>
            <th>Product Name</th>
            <th>Desc</th>
            <th>Category Name</th>
            <th>Price</th>
            <th>Image</th>
            <th>Action Button</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->categoryName }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <img src="{{ Storage::url($product->image) }}" alt="" width="20%">
            </td>
            <td>
                <form action="/products/ {{ $product->id }}" method="post" onsubmit="return confirm('Sure to delete?')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="/products/{{ $product->id }}/edit">Update</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>