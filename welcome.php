<?php
    if (isset($_COOKIE["language"])) {
        $fechaActual = date("Y-m-d");

        //Elimina las cookies del idioma
        function delete_cookies_language() {
            setcookie("language", "", time() - 3600, "/");
        }

        //Elimina la cookie del registro de la ultima visita
        function delete_cookies_last_visit() {
            setcookie("last_visit", "", time() - 3600, "/");
        }

        if (isset($_GET["delete_cookies_language"])) {
            delete_cookies_language();
            header('Location: index.php');
            exit();
        }

        if (isset($_GET["delete_cookies_last_visit"])) {
            delete_cookies_last_visit();
            header('Location: welcome.php');
            exit();
        }

        
        if ($_COOKIE["language"] == "es") {
            echo "<h2>Bienvenido</h2> <br>";
        } else if ($_COOKIE["language"] == "fr") {
            echo "<h2>Bienvenue</h2> <br>";
        } else {
            echo "<h2>Welcome</h2> <br>";
        }

            //Si no se ha eliminado el registro de la ultima visita
            if (isset($_COOKIE["last_visit"])) {
            echo "Visitó esta pagina por última vez " . $_COOKIE["last_visit"] . "";
            
            //Si no hay registro
            } else {
                echo "Es la primera vez que visita la página";
            }

        echo '<br><a href="?delete_cookies_language=1">Eliminar preferencia de idioma</a>';
        echo '<br><a href="?delete_cookies_last_visit=1">Eliminar el registro de la ultima visita</a>';

        //se modifican las cookies
        setcookie("last_visit", $fechaActual, time() +  (7 * 24 * 60 * 60), "/");
    } else {
        header('Location: index.php');
    }

?>