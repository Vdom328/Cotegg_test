<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 300px;
}

.container h2 {
    margin-bottom: 30px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.btn {
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    cursor: pointer;
    width: 100%;
}

.btn:hover {
    background-color: #0056b3;
}
</style>
<link type="text/css" rel="stylesheet" href="{{ asset('assets/plugins/jquery.growl/jquery.growl.css') }}">

@vite([
    'resources/css/style.css',
    'resources/js/common.js'
])
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="{{ route('cms.auth-cms.postLogin') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="username">ID:</label>
            <input type="text" id="login_id" name="login_id" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn">Login</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/js/plugin-bundle.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/adata-init.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.growl/jquery.growl.js') }}"></script>

@include('cms.layouts.partials.message')
</body>
</html>
