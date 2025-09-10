<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create / Add</title>
</head>

<body>
    <title>({ $title })</title>
    <form action="/products/create" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session('success'))
            <div role="alert">
                <strong>Success!</strong>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <div>
            <label for="name">Product Name</label> 
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Product Description</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="categoryName">Category Name</label>
            <textarea name="categoryName" id="categoryName" required></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" required>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit">Create Product</button>
    </form>
</body> 

</html>