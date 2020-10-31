<?php
		$connect = mysqli_connect("localhost", "root" , "", "audiofeedbacksystem");
    if(! $connect )
    {
      die('Could not connect: ' . mysql_error());
    }
?>
