<!DOCTYPE html>
<head>
    <!-- <meta charset="utf-8"> -->
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="stylesheets/css/app.css"> -->
    <title>
        <?php if (isset($title)) : echo $title . ' - '; endif; ?>
        Shuffle Lunch
    </title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">Shuffle Lunch</a>
        </h1>
    </header>
    <div>
        <?php echo $content; ?>
    </div>
</body>
</html>