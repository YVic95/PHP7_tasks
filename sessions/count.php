<?php
    session_start();
    if( !isset( $_SESSION['count'] ) ) $_SESSION['count'] = 0;
    $_SESSION['count'] = $_SESSION['count'] + 1;
?>
<h2>Counter</h2>
<p>You have opened this page </p>
<?= $_SESSION['count'] ?> 
<p> times during this session </p><br/>
<p>Please, close the browser to reset the counter</p><br/>
<a href="<?= $_SERVER['SCRIPT_NAME']?>" target="_blank">Open subwindow</a>