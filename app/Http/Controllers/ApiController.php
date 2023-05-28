<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_Picture;
use App\Models\Item_Model;
use App\Models\Item_Description;
use App\Models\Item_Tag;
use App\Models\Item_Tag_Translation;
use App\Models\Item_Tag_Value_Translation;
use App\Models\Item_Attribute;
use App\Models\Api_Info;
use Illuminate\Http\Request;
use Session;

class ApiController extends Controller
{

    public function InsertItems_Json()
    {
        if (empty(Session::get('api_info'))) {
            return redirect('/api');
        }

        echo nl2br("Response Status Code: " . Session::get('api_info')["response_status_code"] . "\r\n");
        echo nl2br("New created file: " . Session::get('api_info')["new_file"] . "\r\n");
        echo nl2br("Deleted files: \r\n");
        foreach (Session::get('api_info')["deleted_files"] as $file) {
            echo nl2br($file . "\r\n");
        }

        // iegūst saturu no jaunākā izveidotā faila
        $json_file = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/downloads/api_items/" . Session::get('api_info')["new_file"]);

        // atšifrēt JSON saturn masīvā veidā
        $item_arrays = json_decode($json_file, true);


        $totalNumberOfElements = $item_arrays["totalNumberOfElements"];

        // Create or update "api_info" table
        Api_Info::truncate();
        $api_info_data = array(
            "totalNumberOfElements" => $item_arrays["totalNumberOfElements"],
            "imgBase" => $item_arrays["imgBase"]
        );
        Api_Info::insert($api_info_data);
        
        // ierakstīt datus masīvā par produktu, katrai vērtībai dot datu bāzes lauka nosaukuma atslēgu
        for ($i = 0; $i < $totalNumberOfElements; $i++) {
            $item_data = array(
                "item_api_id" => $item_arrays["items"][$i]["_id"],
                "availability" => $item_arrays["items"][$i]["availability"],
                "bestTaxable" => $item_arrays["items"][$i]["bestTaxable"],
                "brand" => $item_arrays["items"][$i]["brand"],
                "catalogRuleId" => $item_arrays["items"][$i]["catalogRuleId"],
                "code" => $item_arrays["items"][$i]["code"],
                "currency" => $item_arrays["items"][$i]["currency"],
                "intangible" => $item_arrays["items"][$i]["intangible"],
                "intra" => $item_arrays["items"][$i]["intra"],
                "lastUpdate" => $item_arrays["items"][$i]["lastUpdate"],
                "madein" => $item_arrays["items"][$i]["madein"],
                "name" => $item_arrays["items"][$i]["name"],
                "noVariation" => $item_arrays["items"][$i]["noVariation"],
                "online" => $item_arrays["items"][$i]["online"],
                "taxable" => $item_arrays["items"][$i]["taxable"],
                "type" => $item_arrays["items"][$i]["type"],
                "weight" => $item_arrays["items"][$i]["weight"],
                "item_id" => $item_arrays["items"][$i]["id"],
                "sellPrice" => $item_arrays["items"][$i]["sellPrice"],
                "ruleId" => $item_arrays["items"][$i]["ruleId"],
                "created_at" => date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME']),
                "updated_at" => date("Y-m-d H:i:s", $_SERVER['REQUEST_TIME'])
            );

            if (isset($item_arrays["items"][$i]["createdAt"])) {
                $item_data  += ["createdAt" => $item_arrays["items"][$i]["createdAt"]];
            }
            
            // izveidot vai atjaunot "item" tabulu
            Item::updateOrCreate(
                    ["item_api_id" => $item_arrays["items"][$i]["_id"]], $item_data
                );
            }

            // Create or update "item_attribute" table
            Item_Attribute::truncate();
            for ($i = 0; $i < $totalNumberOfElements; $i++) {

                foreach (array_keys($item_arrays["items"][$i]["attributes"]) as $attr_name) {
                    $item_attribute_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "name" => $attr_name,
                        "value" => $item_arrays["items"][$i]["attributes"][$attr_name]
                    );
                    Item_Attribute::insert($item_attribute_data);
                }
            }

            // Create or update "item_description" table
            Item_Description::truncate();
            for ($i = 0; $i < $totalNumberOfElements; $i++) {
                foreach (array_keys($item_arrays["items"][$i]["descriptions"]) as   $localecode) {
                    $item_description_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "description" => $item_arrays["items"][$i]["descriptions"][$localecode],
                        "localecode" => $localecode
                    );
                Item_Description::insert($item_description_data);
                }
            }
            

            // Create or update "item_model" table
            for ($i = 0; $i < $totalNumberOfElements; $i++) {
                foreach ($item_arrays["items"][$i]["models"] as $model) {


                    foreach (array_keys($model) as $model_key) {
                        if (is_array($model[$model_key])) {
                        $model[$model_key] = serialize($model[$model_key]);
                        }
                    }
                    
                    $item_model_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "availability" => $model["availability"],
                        "bestTaxable" => $model["bestTaxable"],
                        "streetPrice" => $model["streetPrice"],
                        "suggestedPrice" => $model["suggestedPrice"],
                        "taxable" => $model["taxable"],
                        "model" => $model["model"],
                        "backorder" => $model["backorder"],
                        "code" => $model["code"],
                        "size" => $model["size"],
                        "color" => $model["color"],
                        "barcode" => $model["barcode"],
                        "lastUpdate" => $model["lastUpdate"],
                        "lastTimeZero" => $model["lastTimeZero"],
                        "model_id" => $model["id"],
                        "sellPrice" => $model["sellPrice"],
                        "ruleId" => $model["ruleId"]
                    );

                    
                    if (isset($model["attributes"])) {
                        $item_model_data  += ["attributes" => $model["attributes"]];
                    }

                    if (isset($model["descriptions"])) {
                        $item_model_data  += ["descriptions" => $model["descriptions"]];
                    }
                                      
                    Item_Model::updateOrCreate(
                        [ "model_id" => $model["id"] ], $item_model_data
                    );
                    
                    
                }
            }
            
            // Create or update "item_picture" table
            
            for ($i = 0; $i < $totalNumberOfElements; $i++) {
                foreach ($item_arrays["items"][$i]["pictures"] as $pictures) {
                    $item_pictures_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "url" => $pictures["url"],
                        "blob" => $pictures["blob"],
                        "picture_id" =>  $pictures["id"]
                    );

                    Item_Picture::updateOrCreate(
                        [ "picture_id" => $pictures["id"] ], $item_pictures_data
                    );
                }
            }
        


            Item_Tag::truncate();
            Item_Tag_Translation::truncate();
            Item_Tag_Value_Translation::truncate();
            for ($i = 0; $i < $totalNumberOfElements; $i++) {

                // Create or update "item_tag" table
                foreach ($item_arrays["items"][$i]["tags"] as $tag) {

                    $item_tag_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "hidden" => $tag["hidden"],
                        "priority" => $tag["priority"],
                        "name" => $tag["name"],
                        "value" => $tag["value"]["value"],
                        "tag_id" => $tag["id"],
                    );

                    Item_Tag::insert($item_tag_data);

                    // Create or update "item_tag_translation" table
                    foreach (array_keys($tag["translations"]) as $localecode) {

                        $item_tag_translation_data = array(
                            "item_api_id" => $item_arrays["items"][$i]["_id"],
                            "tag_id" => $tag["id"],
                            "localecode" => $localecode,
                            "value" => $tag["translations"][$localecode]
                        );

                        Item_Tag_Translation::insert($item_tag_translation_data);
                    }

                    // Create or update "item_tag_value_translation" table
                    foreach (array_keys($tag["value"]["translations"]) as $localecode) {

                        $item_tag_value_translation_data = array(
                            "item_api_id" => $item_arrays["items"][$i]["_id"],
                            "tag_id" => $tag["id"],
                            "localecode" => $localecode,
                            "value" => $tag["value"]["translations"][$localecode]
                        );

                        Item_Tag_Value_Translation::insert($item_tag_value_translation_data);
                    }
                }
            }
            
        }




            // Create or update "item_tag" table
            /*
        Item_Tag::truncate();
        for ($i = 0; $i < $totalNumberOfElements; $i++) {
            foreach ($item_arrays["items"][$i]["tags"] as $tag) {
                $item_tag_data = array(
                    "item_api_id" => $item_arrays["items"][$i]["_id"],
                    "hidden" => $tag["hidden"],
                    "priority" => $tag["priority"],
                    "name" => $tag["name"],
                    "value" => $tag["value"]["value"],
                    "tag_id" => $tag["id"],
                );

                Item_Tag::insert($item_tag_data);
            }
        }


        // Create or update "item_tag_translation" table
        Item_Tag_Translation::truncate();
        for ($i = 0; $i < $totalNumberOfElements; $i++) {
            foreach ($item_arrays["items"][$i]["tags"] as $tag) {
                foreach (array_keys($tag["translations"]) as $localecode) {
                    $item_tag_translation_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "tag_id" => $tag["id"],
                        "localecode" => $localecode,
                        "value" => $tag["translations"][$localecode]
                    );

                    Item_Tag_Translation::insert($item_tag_translation_data);
                }
            }
        }
        */


            // Create or update "item_tag_value_translation" table
            /*
        Item_Tag_Value_Translation::truncate();
        for ($i = 0; $i < $totalNumberOfElements; $i++) {
            foreach ($item_arrays["items"][$i]["tags"] as $tag) {
                foreach (array_keys($tag["value"]["translations"]) as $localecode) {


                    $item_tag_value_translation_data = array(
                        "item_api_id" => $item_arrays["items"][$i]["_id"],
                        "tag_id" => $tag["id"],
                        "localecode" => $localecode,
                        "value" => $tag["value"]["translations"][$localecode]
                    );
                    
                    Item_Tag_Value_Translation::insert($item_tag_value_translation_data);
                }
            }
        }*/



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
