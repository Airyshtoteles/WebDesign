<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="<?= base_url('css/admin-style.css') ?>">
</head>
<body>
    <div class="form-container">
        <form action="<?= base_url('admin/login/auth') ?>" method="POST">
            <h2>Login Admin</h2>
            
            <div class="form-group">
                <label for="username">Username atau Email</label>
                <input type="text" id="username" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-submit">Login</button>
        </form>
    </div>
</body>
</html>
