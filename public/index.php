<?php
const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . 'utils/functions.php';

spl_autoload_register(function ($class): void {
    // Core\Database
    $result = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$result}.php");
});

require "./bootstrap.php";
