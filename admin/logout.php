<?php

session_start();

session_destroy();

echo "<script>window.open('login.php?logout=Uspesno ste se izlogovali!','_self') </script>";

?>
