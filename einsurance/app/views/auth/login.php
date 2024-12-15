<div class="container mt-5">
    <h3>Login</h3>
    <?php Flasher::getFlash(); ?>
    <form action="<?= BASEURL; ?>auth/login_submit" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" class="form-control" id="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <a href="<?= BASEURL; ?>auth/register">Register</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>