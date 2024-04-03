<div>
    <a href="employee">Register</a>
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