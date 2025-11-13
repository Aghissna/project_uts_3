<div class="container">
    <h2>Register</h2>

    <form action="process_register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan Username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Masukkan Email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan Password" required>

        <button type="submit">Register</button>
    </form>

    <p>Sudah punya akun? 
        <a href="index.php?page=login">Login di sini</a>
    </p>
</div>