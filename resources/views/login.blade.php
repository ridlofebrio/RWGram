<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Login</h1>
    <form action="/login" method="POST" >
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            
            <input type="password" name="password" id=""  >
            @error('password')

            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


        </div>

        <button type="submit">Login</button>
    </form>
</body>
</html>