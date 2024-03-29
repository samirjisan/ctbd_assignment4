<!-- index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="container">
    <br />
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Location</th>
            <th>Gender</th>
        </tr>
        </thead>
        <tbody>

        @foreach($passports as $passport)
            @php
            $date=date('Y-m-d', $passport['date']);
            @endphp
            <tr>
                <td>{{$passport['id']}}</td>
                <td>{{$passport['username']}}</td>
                <td>{{$passport['fname']}}</td>
                <td>{{$passport['lname']}}</td>
                <td>{{$passport['email']}}</td>
                <td>{{$passport['phone_number']}}</td>
                <td>{{$passport['location']}}</td>
                <td>{{$passport['gender']}}</td>
                <th colspan="2">Action</th>

                <td><a href="{{action('PassportController@edit', $passport['id'])}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="{{action('PassportController@destroy', $passport['id'])}}" method="post">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>