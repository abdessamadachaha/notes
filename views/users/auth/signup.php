<?php 
    ob_start();
?>

    <style>
       body {
        background: #f4efe6;
        font-family: Georgia, "Times New Roman", serif;
        color: #222;
        margin: 0;
        padding: 0;
    }

    .signup-box {
        width: 340px;
        margin: 60px auto;
        padding: 25px 30px;
        background: #fffdf8;
        border: 2px solid #222;
        box-shadow: 6px 6px 0 #222;
        box-sizing: border-box;
    }

    .signup-box h2 {
        margin: 0 0 20px;
        padding-bottom: 10px;
        text-align: center;
        border-bottom: 1px dashed #222;
    }

    .signup-box label {
        display: block;
        margin: 14px 0 4px;
        font-weight: bold;
    }

    .signup-box input[type="email"],
    .signup-box input[type="password"] {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #222;
        background: #fff;
        font-family: inherit;
        font-size: 15px;
    }

    .signup-box input:focus {
        outline: none;
        background: #fff8dc;
    }

    .signup-box input[type="submit"] {
        width: 100%;
        margin-top: 22px;
        padding: 10px;
        background: #222;
        color: #fffdf8;
        border: 2px solid #222;
        font-family: inherit;
        font-size: 16px;
        cursor: pointer;
    }

    .signup-box input[type="submit"]:hover {
        background: #fffdf8;
        color: #222;
    }

    .login-link {
        margin-top: 18px;
        padding-top: 12px;
        text-align: center;
        font-size: 14px;
        border-top: 1px dashed #222;
    }

    .login-link a {
        color: #222;
        font-weight: bold;
        text-decoration: underline;
    }

    .login-link a:hover {
        background: #222;
        color: #fffdf8;
        text-decoration: none;
        padding: 2px 4px;
        
    }

    .show {
        width: max-content;
        padding: 15px;
        text-align: center;
        color: white;
        border-radius: 3px;
        margin: 20px 0 0 30px;
    }
    </style>

    <?php 
        if (!empty($response)) {
            ?>
            <div class="show" style="background-color: <?= $response['success'] ? 'green' : 'red' ?>">
                <?= htmlspecialchars($response['message']) ?>
            </div>
            <?php
        }
    ?>

    <div class="signup-box">
        <h2>Sign Up</h2>

        <form action="/notes/main.php?action=store" method="post">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" required>

            <input type="submit" value="SignUp" name="signup">

            <div class="login-link">
                I already have an account?
                <a href="/notes/main.php?action=login">Login</a>
            </div>
        </form>
    </div>

<?php 
    $title = "SignUp";
    $content = ob_get_clean();
    require __DIR__. "/../layer.php";
?>