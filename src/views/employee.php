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
        <form action="/employee/create" method="post">
            <label>Register Employee Name</label>
            <input type="text" id="employee_name" name="employee_name">
            <input type="submit" value="Submit">
        </form>
    </div>
    <div>
        <?php foreach ($employeeNames as $employeeName): ?>
            <p><?php echo $employeeName['name']; ?></p>
        <?php endforeach; ?>
    </div>
</body>
</html>