<?php

if (isset($_GET['delete']) && $_GET['delete'] <> '') {
        if ($_GET['delete'] <> "") {
                echo "Videz le dossier avant de le supprimer !";
                echo  '<meta http-equiv="refresh" content="3;URL=index.php">';
        } else {
                rmdir($_GET['delete']);
                echo  '<meta http-equiv="refresh" content="0;URL=index.php">';
        }
}