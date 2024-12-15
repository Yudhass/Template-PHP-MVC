<div class="container mt-5">
    <h3>Register</h3>
    <form action="<?= BASEURL; ?>auth/register_submit" method="post">
        <div class="mb-3">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" >
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <a href="<?= BASEURL; ?>auth/login">Login</a>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>