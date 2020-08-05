<?php

session_start();

include "../vendor/autoload.php";

//try {
(new Core\Router())->run();
// } catch (\Throwable $th) {
//     $_SESSION['errors'][] = $th->getMessage();
// }
