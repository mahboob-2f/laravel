<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>

    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: Arial, sans-serif;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #5a67d8;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Register</h2>
        <form action="/submitForm" method="POST">
            @csrf
            <div>
                <label for="name">name</label>
                <input type="text" name="name" placeholder="enter name" id="name">
            </div>
            <div>
                <label for="email">email</label>
                <input type="email" name="email" placeholder="enter email" id="email">
            </div>
            <div>
                <label for="password">password</label>
                <input type="password" name="password" placeholder="enter password">
            </div>
            <div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>

</body>
</html>