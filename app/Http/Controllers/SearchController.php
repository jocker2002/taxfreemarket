<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Item_Attribute;
use App\Models\Api_Info;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function show_items(Request $request)
    {

        if (isset($_GET["k"])) {

            $key = $_GET["k"];

            $item_data = array(
                "items" => Item::orderBy("lastUpdate", "desc")->where("name", "like", "%".$key."%")->orWhere("brand", "like", "%".$key."%")->paginate(24)
            );
            
        } else {

            $item_data = array(
                "items" => Item::orderBy("lastUpdate", "desc")->paginate(24)
            );

        }       
        
        return view("pages.search.item-catalog", $item_data);
    }

    public function show_category(Request $request, $category)
    {
        
        $items_cat = DB::table("item_attribute")->where([["name", "category"], ["value", $category]])->get("item_api_id");

        $items_id = array();

        foreach($items_cat as $item_cat) {
            array_push($items_id, $item_cat->item_api_id);
        }
        
        
        $item_data = array(
            "items" => Item::orderBy("lastUpdate", "desc")->whereIn("item_api_id", $items_id)->paginate(24),
        );
        

        return view("pages.search.item-catalog", $item_data);
        
    }
}
