<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Customer</title>
</head>

<body>
    <title>Add Customer</title>
    <form action="/customer/create" method="POST" enctype="multipart/form-data">
        @csrf
        @if (session('success'))
            <div role="alert">
                <strong>Success!</strong>
                <span>{{ session('success') }}</span>
            </div>
        @endif
        <div>
            <label for="name">Name</label> 
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="price">Phone Number</label>
            <input type="number" name="phone_num" required>
        </div>
        <div>
            <label for="image">Address</label>
            <input type="text" name="address" required>
        </div>
        <button type="submit">Add</button>
    </form>
</body> 

</html>