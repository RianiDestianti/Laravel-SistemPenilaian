<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login dengan NIP / NIS</h2>
    @if($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif
    <form method="POST" action="{{ url('/login') }}">
        @csrf
        <label>Masukkan NIP atau NIS:</label>
        <input type="text" name="identifier" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
