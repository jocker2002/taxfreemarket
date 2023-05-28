<?php 

function ScandirPrefixExt($dir, $file_prefix, $ext)
{
    $scandir = scandir($dir);
    $searched_files = array();
    foreach ($scandir as $file) {
        if (str_contains($file, $file_prefix) && pathinfo($file, PATHINFO_EXTENSION) == $ext) {
            array_push($searched_files, $file);
        }
    };
    return $searched_files;
}


$scanned_files = ScandirPrefixExt(__DIR__, "items_", "json");

$newest_file = end($scanned_files);

$json_file = file_get_contents($newest_file);

$json_file_decoded = json_decode($json_file);

echo "<pre>";
print_r($json_file_decoded);
echo "</pre>";
