<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
</head>
<body>

    <h2>Student Registration Form</h2>

    @if(session('success'))
        <p style="color: green;">
            {{ session('success') }}
        </p>
    @endif

    <form action="/first" method="POST">
        @csrf <!-- CSRF Protection -->

        <div>
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">

            @error('name')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">

            @error('email')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <div>
            <label>Age:</label>
            <input type="number" name="age" value="{{ old('age') }}">

            @error('age')
                <span style="color:red;">{{ $message }}</span>
            @enderror
        </div>

        <br>

        <button type="submit">Register</button>
    </form>

</body>
</html>