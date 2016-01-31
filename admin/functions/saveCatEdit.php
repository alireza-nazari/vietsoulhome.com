<?php
include "../../includes/connection.php";
// Cut down Strange <br> tag
$content = mysqli_real_escape_string($connection, $_POST['editval']);
$checkBRtag = substr($content, -4);
if (strcmp($checkBRtag, "<br>") == 0)
    $content = substr($content, 0, -4);

$result = mysqli_query($connection, "UPDATE categories set " . $_POST["column"] . " = '".$content."' WHERE  cat_ID=".$_POST["id"]);
?>