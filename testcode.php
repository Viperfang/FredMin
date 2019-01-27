<?php
// List files as links
foreach (glob("modules/*") as $file) {
    echo "<a href='$file'>$file</a><br />";
}
?>
