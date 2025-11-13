<?php
if (!isset($_SESSION['username'])) {
    header("Location: index.php?page=login");
    exit();
}
?>
<style>
.container .welcome-box p {
    font-size: 23px !important;
    color: #800000; 
    animation: fadeIn 1.2s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<div class="container" style="width: 30%; margin: 70px auto; text-align: center;">
    <div class="welcome-box">
        <p>Selamat datang, <b><?= htmlspecialchars($_SESSION['username']); ?></b> 👋</p>
    </div>
</div>
