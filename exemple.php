<?php

    $random = mt_rand(1, 100);
    $random *= 2;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Robot</title>
</head>
<body>
    <h1>Robot</h1>
    
    <p>
        Le nombre aléatoire choisi est 
        <?php if ($random <= 100) { ?>
            <span style="color:red"><?php echo $random ?></span>
        <?php } else { ?>
            <span style="color:blue"><?php echo $random ?></span>
        <?php } ?>
    </p>
    
    <!-- Version avec syntaxe alternative -->
    <p>
        Le nombre aléatoire choisi est 
        <?php if ($random <= 100): ?>
            <span style="color:red"><?= $random ?></span>
        <?php else: ?>
            <span style="color:blue"><?= $random ?></span>
        <?php endif ?>
    </p>
    
    <?php
        echo '<p>Le nombre aléatoire choisi est ' . $random . '</p>';  
    ?>
</body>
</html>