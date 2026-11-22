<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title ?? 'Notes') ?></title>

    <style>
        body {
            margin: 0;
            background: #f4efe6;
            font-family: Georgia, "Times New Roman", serif;
            color: #222;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px 30px;
            background: #fffdf8;
            border-bottom: 2px solid #222;
            box-shadow: 0 4px 0 #222;
        }

        .header .logo {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }

        .header nav {
            display: flex;
            gap: 12px;
        }

        .header nav a {
            padding: 6px 14px;
            color: #222;
            text-decoration: none;
            border: 2px solid #222;
            font-size: 15px;
        }

        .header nav a:hover,
        .header nav a.active {
            background: #222;
            color: #fffdf8;
        }
    </style>
</head>
<body>

    <header class="header">
        <h1 class="logo">My Notes App</h1>

        <nav>
            <a href="/notes/main.php?action=notes">Notes</a>

            <a href="/notes/main.php?action=create">Create Note</a>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

</body>
</html>