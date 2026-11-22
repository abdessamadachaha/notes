<?php
    ob_start();
?>

<style>
    .welcome-box {
        width: 500px;
        max-width: 90%;
        margin: 60px auto;
        padding: 25px 30px;
        background: #fffdf8;
        border: 2px solid #222;
        box-shadow: 6px 6px 0 #222;
        box-sizing: border-box;
        text-align: center;
    }

    .welcome-box h2 {
        margin: 0 0 20px;
        padding-bottom: 10px;
        border-bottom: 1px dashed #222;
    }

    .welcome-box .email {
        display: block;
        margin-top: 6px;
        font-size: 16px;
        font-weight: normal;
        word-break: break-word;
    }

    .welcome-box p {
        margin: 0 0 20px;
        font-size: 15px;
    }

    .welcome-box .actions {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .welcome-box .actions a {
        flex: 1;
        min-width: 130px;
        padding: 10px;
        background: #222;
        color: #fffdf8;
        text-decoration: none;
        border: 2px solid #222;
        font-size: 15px;
    }

    .welcome-box .actions a:hover {
        background: #fffdf8;
        color: #222;
    }
</style>

<div class="welcome-box">
    <h2>
        Welcome to your Dashboard
        <span class="email"><?= htmlspecialchars($user->email) ?></span>
    </h2>

    <p>What would you like to do today?</p>

    <div class="actions">
        <a href="/notes/main.php?action=create">Create Note</a>
        <a href="/notes/main.php?action=notes">My Notes</a>
    </div>
</div>

<?php 
    $title = "Dashboard";
    $content = ob_get_clean();
    require __DIR__. "/users/layer.php";
?>