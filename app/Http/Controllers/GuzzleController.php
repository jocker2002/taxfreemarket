<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use \GuzzleHttp\Psr7\Utils;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Api_Info;


class GuzzleController extends Controller
{
    public function API_Items_Download()
    {
        $client = new Client(); // jauna klienta deklarēšana, lai sataisītu savienijumu ar saiti.

        $client->setDefaultOption(array('verify', false));
    
        $filepath = $_SERVER['DOCUMENT_ROOT'] . "/downloads/api_items/"; // ceļš uz mapi, kurā būs saglabāts izveidots fails.

        $filename = "items_" .  $_SERVER['REQUEST_TIME'] . ".json"; // faila nosaukums, kurā būs ielādēts lapas saturs.
        
        $api_url = Api_Info::first("url");

        // saite no BDroppy preču piegādātāja ar saturu par informāciju par precēm.

        Utils::tryFopen($filepath . $filename, 'w'); // izveidot jaunu failu ar rakstīšanas iespēju.

        $response = $client->request('GET', $api_url, [ // atsaucamies uz preču piegādātāja saiti, izmantojot GET metodi.
            'sink' => $filepath . $filename // preču pievienošana no BDroppy izveidotajam failam
        ]);

        $response_status_code = $response->getStatusCode();
        echo nl2br("Response Status Code: " . $response_status_code . "\r\n");

        
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

        $scanned_files = ScandirPrefixExt($filepath, "items_", "json");


        if ($response_status_code == 200) {

            $newFile = end($scanned_files);
            echo nl2br("New created file: " . $newFile . "\r\n");

            if (count($scanned_files) > 5) {
                $deleted_files = array();
                while (count($scanned_files) > 5) {
                    array_push($deleted_files, $scanned_files[0]);
                    unlink($filepath . $scanned_files[0]);
                    $scanned_files = ScandirPrefixExt($filepath, "items_", "json");
                }
                echo nl2br("Deleted files: \r\n");
                foreach ($deleted_files as $file) {
                    echo nl2br($file . "\r\n");
                }
            }
        } else {
            echo "Connection failed!";
        }

        $api_info = array (
            "response_status_code" => $response_status_code,
            "new_file" => $newFile,
            "deleted_files" => $deleted_files,
        );

        return redirect('/upd')->with('api_info',$api_info);
    }
}
