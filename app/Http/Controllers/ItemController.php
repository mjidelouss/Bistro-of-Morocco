<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\User;

class ItemController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::join('categories', 'items.category_id', '=', 'categories.id')
             ->select('items.*', 'categories.category')
             ->get();
            $itemCount = Item::count();
            $userCount = User::count();
            $categories = Category::all();
            $i = 0;
            $c = 0;
        return view('dashboard',compact('items', 'itemCount', 'userCount', 'categories', 'c'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        $c = 0;
        return view('create',compact('categories', 'c'));
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
        $item = new Item;
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($image = $request->file('image')) {
            $destinationPath = 'img/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $item->image = "$profileImage";
        }
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->category_id = $request->category;
        $item->save();
        return redirect()->route('dashboard')->with('success','Item created successfully.');
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
     * @param  \App\Models\Item  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        $categories = Category::all();
        $c = 0;
        return view('edit',compact('item', 'c', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        
        $item = Item::find($id);

        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->category = $request->category;
        $item->image = $request->image;
        $item->save();        
     
        return redirect()->route('dashboard')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Item::destroy($id);
        return redirect()->route('dashboard')->with('success','Item deleted successfully');
    }
}
