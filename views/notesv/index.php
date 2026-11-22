<?php 
    ob_start();
?>

<style>
    body {
        background: #f4efe6;
        font-family: Georgia, "Times New Roman", serif;
        color: #222;
    }

    .notes-box {
        width: 600px;
        max-width: 90%;
        margin: 60px auto;
        padding: 25px 30px;
        background: #fffdf8;
        border: 2px solid #222;
        box-shadow: 6px 6px 0 #222;
        box-sizing: border-box;
    }

    .notes-box h2 {
        margin: 0 0 20px;
        padding-bottom: 10px;
        text-align: center;
        border-bottom: 1px dashed #222;
    }

    .notes-box table {
        width: 100%;
        border-collapse: collapse;
    }

    .notes-box th,
    .notes-box td {
        padding: 10px;
        text-align: left;
        border: 1px solid #222;
        word-break: break-word;
    }

    .notes-box th {
        background: #222;
        color: #fffdf8;
    }

    .notes-box th:last-child,
    .notes-box td:last-child {
        width: 110px;
        text-align: center;
    }

    .notes-box tbody tr:nth-child(even) {
        background: #f4efe6;
    }

    .notes-box tbody tr:hover {
        background: #fff8dc;
    }

    .notes-box .empty {
        text-align: center;
        font-style: italic;
    }

    .notes-box td form {
        margin: 0;
    }

    .notes-box input[type="submit"] {
        padding: 6px 12px;
        background: #222;
        color: #fffdf8;
        border: 2px solid #222;
        font-family: inherit;
        font-size: 14px;
        cursor: pointer;
    }

    .notes-box input[type="submit"]:hover {
        background: #f6d5cf;
        color: #222;
    }
</style>

<div class="notes-box">
    <h2>My Notes</h2>

    <table>
        <thead>
            <tr>
                <th>Content</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            <?php if (empty($notes)): ?>
                <tr>
                    <td colspan="2" class="empty">You don't have any notes yet.</td>
                </tr>
            <?php else: ?>
                <?php foreach($notes as $note): ?>
                    <tr>
                        <td><?= htmlspecialchars($note->body) ?></td>
                        <td>
                            <form action="/notes/main.php?action=delete" method="post"
                                  onsubmit="return confirm('Delete this note?');">
                                <input type="hidden" name="id" value="<?= (int) $note->note_id ?>">
                                <input type="submit" value="Delete" name="delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php 
    $title = "List of Notes";
    $content = ob_get_clean();
    require __DIR__. "/../users/layer.php";
?>