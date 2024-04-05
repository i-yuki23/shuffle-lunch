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

