<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:shop-admin')->only(['edit', 'deleteShopItem', 'destroy', 'store', 'update']); // Allow only admins to call /edit 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prekes = Shop::all();
        return view('shop.index', compact('prekes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.addProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'pavadinimas' => 'required',
            'gamintojas' => 'required',
            'aprasymas' => 'required|max:500',
            'kaina' => 'required|min:0.01',
            'data' => 'nullable|date'
        ]);

        $preke = new Shop();

        $preke->pavadinimas = $data['pavadinimas'];
        $preke->gamintojas = $data['gamintojas'];
        $preke->aprasymas = $data['aprasymas'];
        $preke->kaina = $data['kaina'];
        $preke->galioja_iki_data = $data['data'];
        
        $preke->save();
        return Redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        return view('shop.viewProduct')->with('preke', $shop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('shop.editProduct')->with('preke', $shop);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        $data = $request->validate([
            'pavadinimas' => 'required',
            'gamintojas' => 'required',
            'aprasymas' => 'required|max:500',
            'kaina' => 'required|min:0.01',
            'data' => 'nullable|date'
        ]);

        $preke = $shop;

        $preke->pavadinimas = $data['pavadinimas'];
        $preke->gamintojas = $data['gamintojas'];
        $preke->aprasymas = $data['aprasymas'];
        $preke->kaina = $data['kaina'];
        $preke->galioja_iki_data = $data['data'];
        
        $preke->save();
        return Redirect()->route('shop.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $shop->delete();
        return Redirect()->route('shop.index');
    }

    public function deleteShopItem(Shop $shop) {
        return view('shop.removeProduct')->with('preke', $shop);
    }
}
