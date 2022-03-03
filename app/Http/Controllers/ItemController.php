<?php

namespace App\Http\Controllers;

use App\Constants\ItemType;
use App\Handlers\ItemHandler;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\ItemCategory;
use App\Models\Item;
use App\Models\Outlet;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $items = app(ItemHandler::class)->searchItems($request->search);

            return view('items.index', [
                'items' => $items
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $categories = ItemCategory::all();
            $outlets = Outlet::all();
            $types = Type::all();

            return view('items.create', [
                'categories' => $categories,
                'types' => $types,
                'outlets' => $outlets
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        try {
            $itemType = Type::where('name', $request->type)->firstOrFail();

            $requiredStoreData = [
                'name' => $request->name,
                'category_id' => $request->category_id,
                'outlet_id' => $request->outlet_id,
                'code' => $request->code,
                'properties' => [],
                'type_id' => $itemType->id,
                'added_date' => $request->added_date,
            ];

            if ($request->type == ItemType::RENTABLE) {
                $requiredStoreData['properties'] = [
                    'rent_per_day' => $request->rent_per_day,
                    'rent_per_week' => $request->rent_per_week,
                    'rent_per_month' => $request->rent_per_month
                ];
            }

            if ($request->type == ItemType::SUPPORTABLE) {
                $requiredStoreData['properties'] = [
                    'rent' => $request->rent,
                ];
            }

            $requiredStoreData['properties']['market_value'] = $request->market_value;

            if (isset($request->description)) {
                $requiredStoreData['description'] = $request->description;
            }

            Item::create($requiredStoreData);

            Session::flash('message', ['status' => 'success', 'message' => 'Item has been created successfully.']);

            return back();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $item = Item::with(['type'])->findOrFail($id);
            $categories = ItemCategory::all();
            $outlets = Outlet::all();
            $types = Type::all();

            return view('items.edit', [
                'item' => $item,
                'categories' => $categories,
                'types' => $types,
                'outlets' => $outlets
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request)
    {
        try {
            $itemType = Type::where('name', $request->type)->firstOrFail();

            $requiredUpdateData = [
                'name' => $request->name,
                'outlet_id' => $request->outlet_id,
                'added_date' => $request->added_date,
                'properties' => [],
                'type_id' => $itemType->id,
            ];

            if ($request->type == ItemType::RENTABLE) {
                $requiredUpdateData['properties'] = [
                    'rent_per_day' => $request->rent_per_day,
                    'rent_per_week' => $request->rent_per_week,
                    'rent_per_month' => $request->rent_per_month
                ];
            }

            if ($request->type == ItemType::SUPPORTABLE) {
                $requiredUpdateData['properties'] = [
                    'rent' => $request->rent,
                ];
            }

            $requiredUpdateData['properties']['market_value'] = $request->market_value;

            if (isset($request->description)) {
                $requiredUpdateData['description'] = $request->description;
            }

            Item::findOrFail($request->item)->update($requiredUpdateData);

            Session::flash('message', ['status' => 'success', 'message' => 'Item has been updated successfully.']);

            return redirect()->route('items.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Item::destroy($id);

            Session::flash('message', ['status' => 'success', 'message' => 'Item has been deleted successfully.']);

            return redirect()->route('items.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
