<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add New Product</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Description:</label>
        <textarea name="description">{{ old('description') }}</textarea><br><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}"><br><br>

        <label>Stock:</label>
        <input type="number" name="stock" value="{{ old('stock') }}"><br><br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
