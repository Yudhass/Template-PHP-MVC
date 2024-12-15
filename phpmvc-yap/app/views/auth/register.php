<div class="container mt-5">
    <h3>Register</h3>
    <form action="<?= BASEURL; ?>user/register_submit" method="post">
        <div class="mb-3">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" id="nama" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" >
        </div>
        <div class="mb-3">
            <a href="<?= BASEURL; ?>user">Login</a>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>