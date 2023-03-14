<?php

require_once('../src/model.php');

list($elements, $answer) = get_current_data(); 
$history = [
    true,
    false,
    true
];

?> 

<!doctype html>
<html lang="en">

<head>

    <link rel="stylesheet" href="/assets/style.css">  
    <meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">



    <title>My Webpage</title>

</head>

<body style='background:
              linear-gradient(rgba(255, 255, 255, 0),
              rgba(255, 255, 255, 0.45),
              rgba(255, 255, 255, 0.7),
              rgba(255, 255, 255, 0.9)), url("<?php echo $answer . ".jpg"; ?>");'>

<?php require('../src/sections/results.php');?>
<?php require('../src/sections/history.php');?>
<?php require('../src/sections/solutions.php');?>


</body>

</html>
