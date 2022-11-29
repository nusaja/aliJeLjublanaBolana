<?php

require_once('model.php');

?> 

<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/style.css">  
    <meta charset="utf-8">

    <title>My Webpage</title>

</head>

<body style='background:
              linear-gradient(rgba(255, 255, 255, 0.3),
              rgba(255, 255, 255, 0.3),
              rgba(255, 255, 255, 0.3),
              rgba(255, 255, 255, 0.3)), url("<?php echo $currentImagePath; ?>");'>

<div class='wrapper'>  

    <h1>Je Ljubljana bolana?</h1>

    <h2><?php echo $answer; ?></h2>

    <p><?php if ($answer === "JA") { echo "Naslednja onesnaževala presegajo najvišje dovoljene vrednosti:"; } else { echo "Nobeno onesnaževalo ne presega najvišje dovoljene vrednosti."; }?><br><br><?php foreach ($elevated_values as $key => $value) { echo $key . "<br>"; } ?></p>

</div>

</body>

</html>
