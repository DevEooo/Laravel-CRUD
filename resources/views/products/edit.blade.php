<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
</head>

<body>
    <title>{{ $title }}</title>
    <form action="/products/{{$product->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if (session('success'))
            <div role="alert">
                <strong>Success!</strong>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <div>
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Product Description</label>
            <input type="text" name="description" id="description" value="{{ $product->description }}"
                required></textarea>
        </div>
        <div>
            <label for="categoryName">Category Name</label>
            <input type="text" name="categoryName" id="categoryName" value="{{ $product->categoryName
}}" required></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" name="price" id="price" value="{{ $product->price }}" required>
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            @if ($product->image)
                <div class="image-preview">
                    <img src="{{ Storage::url($product->image) }}" alt="Current Image" width="20%">
                    <p>Current image</p>
                </div>
            @endif
        </div>
        <button type="submit">Edit Product</button>
    </form>
</body>

</html>