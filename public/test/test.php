<?php
/*
echo "hello php!<br>";


//echo $_COOKIE["test"];


var_dump($_POST['test']);
*/

$fp = fopen("save.html", "w");
if (isset($fp)) {
    fwrite($fp, $_POST["test"]);
    fclose($fp);
    echo "File created and updated!";
} else {
    echo "Fail!";
}

?>
