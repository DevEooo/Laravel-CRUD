<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Table Customer</title>
</head>

<body>
    <h1>Show Table</h1>
    <a href="/customer/create">Add</a>
    <table border="1" style="">
        <tr>
            <th>Customer Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Action Button</th>
        </tr>
    
        @foreach ($customer as $customer)
        <tr>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->phone_num }}</td>
            <td>{{ $customer->address }}</td>
    
            <td>
                <form action="/customer/ {{ $customer->id }}" method="post" onsubmit="return confirm('Sure to delete?')">
                    @csrf 
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <a href="/customer/{{ $customer->id }}/edit">Update</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>