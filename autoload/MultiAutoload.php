<?php
function namespaceAutoload($rawClass)
{

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $rawClass);

    $possiblePaths[] = 'file.php';
    $possiblePaths[] = 'utils\file.php';
    $possiblePaths[] = '..\sys\class\class.file.inc.php';
    include 'utils/AmyClass.php';
    foreach ($possiblePaths as $templatePath) {
        $path = str_replace(["\\", "file"], [DIRECTORY_SEPARATOR, $class], $templatePath);
        if (file_exists($path)) {
            require_once "$path";
            break;
        }
    }
}
spl_autoload_register("namespaceAutoload");

echo get_number_key();