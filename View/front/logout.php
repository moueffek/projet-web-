<?php
$test=$_GET['id'];
?>
<html>
    <head>
    </head>
    <body>
        <form action="get">
        <input type="hidden" name="id">
        </form>
        <h1><?php echo $test;?></h1>
    </body>
</html>