<?php

if (isset($_GET['delete']) && $_GET['delete'] <> '') {

        unlink($_GET['delete']);
        echo  '<meta http-equiv="refresh" content="2;URL=index.php">';
}