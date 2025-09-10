<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Customer</title>
</head>

<body>
    <title>{{ $title }}</title>
    <form action="/customer/{{$customer->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if (session('success'))
            <div role="alert">
                <strong>Success!</strong>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $customer->name }}" required>
        </div>
        <div>
            <label>Phone Number</label>
            <input type="number" name="phone_num" value="{{ $customer->phone_num }}" required>
        </div>
        <div>
            <label>Address</label>
            <input type="text" name="address" value="{{ $customer->address }}" required>
        </div>
        
        <button type="submit">Edit Product</button>
    </form>
</body>

</html>