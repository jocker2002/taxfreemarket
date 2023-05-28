<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use DB;

class Admin_ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Item::get();

        return view("admin.item.index", compact("data"));
    }

    // Edit table - apply changes
    public function action(Request $request)
    {
    	if ($request->ajax()) {

    		if ($request->action == 'edit')
            {
    			$data = array(
                    'item_id' => $request->item_id,
    				'type' => $request->type,
    				'brand' => $request->brand,
                    'name' => $request->name,
    				'code' => $request->code,
                    'intra' => $request->intra,
                    'madein' => $request->madein,
                    'intangible' => $request->intangible,
                    'online' => $request->online,
                    'weight' => $request->weight,
                    'availability' => $request->availability,
                    'sellPrice' => $request->sellPrice,
                    'currency' => $request->currency,
                    'created_at' => $request->created_at,
                    'updated_at' => $request->updated_at,
    			);
    			Item::where('id', $request->id)->update($data);
    		}

    		if ($request->action == 'delete')
    		{
    			Item::where('id', $request->id)->delete();
    		}
    		return response()->json($request);
    	}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.item.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_item= new Item();
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
