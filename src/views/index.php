<!DOCTYPE html>
<head>
    <!-- <meta charset="utf-8"> -->
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="stylesheets/css/app.css"> -->
    <title>Shuffle Lunch</title>
</head>
<body>
    <header>
        <h1>
            <a href="index.php">Shuffle Lunch</a>
        </h1>
    </header>
    <div>
        <a href="employee.php">Register</a>
    </div>
    <div>
        <form action="shuffle" method="post">
            <input type="submit" name="shuffle" value="Shuffle">
        </form>
    </div>
    <?php if ($groups):?>
        <div>
            <?php foreach($groups as $index => $group) : ?>
                <p><?php echo 'Group:' . $index + 1; ?></p>
                <ul>
                    <?php foreach($group as $name) : ?>
                        <li>
                            <?php echo $name;?>
                        </li>
                    <?php endforeach;?>
                </ul>
            <?php endforeach;?>
        </div>
    <?php endif;?>
</body>
</html>