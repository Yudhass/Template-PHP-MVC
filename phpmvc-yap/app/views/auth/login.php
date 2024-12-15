<div class="container mt-5">
    <h3>Login</h3>
    <?php Flasher::getFlash(); ?>
    <form action="<?= BASEURL; ?>user/login_submit" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <a href="<?= BASEURL; ?>user/register">Register</a>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>