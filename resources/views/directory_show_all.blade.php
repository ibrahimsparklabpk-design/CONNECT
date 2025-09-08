<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h1>Directory Entries</h1>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <!-- <table class="table table-bordered"> -->
        <!-- <thead>
            <tr>
                <th>ID</th>
                <th>Professional/Business Name</th>
                <th>Email</th>
                <th>Cell Number</th>
                <th>Work Number</th>
                <th>Industry</th>
                <th>Website</th>
                <th>Education</th>
                <th>Experience</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>Goods/Services</th>
                <th>Profile Picture</th>
                <th>Action</th>
            </tr>
        </thead> -->
        <!-- <tbody> -->
        <!-- @foreach($directories as $directory) -->
        <!-- <tr> -->
        <!-- <td>{{ $directory->id }}</td>
        <td>{{ $directory->professional_or_business_name }}</td>
        <td>{{ $directory->email }}</td>
        <td>{{ $directory->cell_number }}</td>
        <td>{{ $directory->work_number }}</td>
        <td>{{ $directory->industry }}</td>
        <td>{{ $directory->website }}</td>
        <td>{{ $directory->education }}</td>
        <td>{{ $directory->experience }}</td>
        <td>{{ $directory->country }}</td>
        <td>{{ $directory->state }}</td>
        <td>{{ $directory->city }}</td>
        <td>{{ $directory->goods_or_services_provided }}</td> -->
        <!-- <td>
            @if($directory->profile_picture)
            <img src="{{ Storage::url('profile_pictures/' . $directory->profile_picture) }}" width="50" height="50"
                alt="Profile Picture">
            @else
            No Image
            @endif
        </td> -->
        <!-- <td>
                        <form action="#">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td> -->
        <!-- </tr>
        @endforeach
        </tbody>
        </table> -->
        @foreach($directories as $directory)
        <div style="background-color:blur; border: 2px solid red;" width="40%">
            <div style="display:flex">
                @if($directory->profile_picture)
               <img src="{{ Storage::url('profile_pictures/' . $directory->profile_picture) }}" width="50" height="50"
                    alt="Profile Picture"> 
                @else
                No Image
                @endif
                <h3> {{ $directory->professional_or_business_name }}</h3>

            </div>
            <p>
                {{ $directory->goods_or_services_provided }}

            </p>
            <p>
                {{ $directory->country }}</td>

            </p>
            {{ $directory->cell_number }}
        </div>
    </div>
    <br>
    @endforeach

</body>

</html>