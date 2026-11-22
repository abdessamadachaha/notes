<?php 
    ob_start();
?>

<style>
    body {
        background: #f4efe6;
        font-family: Georgia, "Times New Roman", serif;
        color: #222;
    }

    .note-box {
        width: 500px;
        max-width: 90%;
        margin: 60px auto;
        padding: 25px 30px;
        background: #fffdf8;
        border: 2px solid #222;
        box-shadow: 6px 6px 0 #222;
        box-sizing: border-box;
    }

    .note-box h2 {
        margin: 0 0 20px;
        padding-bottom: 10px;
        text-align: center;
        border-bottom: 1px dashed #222;
    }

    .note-box label {
        display: block;
        margin: 14px 0 4px;
        font-weight: bold;
    }

    .note-box textarea {
        width: 100%;
        height: 180px;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #222;
        background: #fff;
        font-family: inherit;
        font-size: 15px;
        resize: vertical;
    }

    .note-box textarea:focus {
        outline: none;
        background: #fff8dc;
    }

    .note-box input[type="submit"] {
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

    .note-box input[type="submit"]:hover {
        background: #fffdf8;
        color: #222;
    }

    .note-box .message {
        margin: 0 0 18px;
        padding: 10px 12px;
        border: 2px solid #222;
        font-size: 14px;
        text-align: center;
        box-shadow: 3px 3px 0 #222;
    }

    .note-box .message.success {
        background: #e4f0d0;
    }

    .note-box .message.error {
        background: #f6d5cf;
    }
</style>

<div class="note-box">
    <h2>Create a Note</h2>

    <?php if (!empty($response)): ?>
        <div class="message <?= $response['success'] ? 'success' : 'error' ?>">
            <?= htmlspecialchars($response['message'], ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <form action="/notes/main.php?action=storenote" method="post">
        <label for="note">Note</label>
        <textarea name="note" id="note" placeholder="Note start..." required></textarea>

        <input type="submit" value="Save" name="save">
    </form>
</div>

<?php 
    $title = "Create a Note";
    $content = ob_get_clean();

    require __DIR__. "/../users/layer.php";
?>