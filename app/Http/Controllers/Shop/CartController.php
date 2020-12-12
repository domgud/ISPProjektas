<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $krepselio_id = Auth::user()->krepselio_id;
        $krepselis = null;

        if ($krepselio_id != null) {
            $krepselis = Cart::findOrFail($krepselio_id);
        }

        return view('shop.viewCart', compact('krepselis'));
    }

    public function delete($prekes_id)
    {
        $preke = Shop::findOrFail($prekes_id);
        $krepselis = Cart::findOrFail(Auth::user()->krepselio_id);

        $k_preke = CartItem::all()
            ->where('krepselio_id', $krepselis->id)
            ->where('prekes_id', $preke->id)
            ->first();
        // dd($k_preke);
        $k_preke->delete();
        $krepselis->suma -= $preke->kaina;
        $krepselis->save();
        return Redirect()->route('cart.index');
    }

    public function report(Cart $cart)
    {
        $krepselis = $cart;
        $pdf = PDF::loadview('shop.report', compact('krepselis'));
        return $pdf->download('krepselio ataskaita.pdf');
        // return view('shop.report', compact('krepselis'));
    }

    public function add($prekes_id) {

        $preke = Shop::findOrFail($prekes_id);

        $krepselio_id = Auth::user()->krepselio_id;
        $krepselis = null;

        if ($krepselio_id != null) { // Fetch existing cart
            $krepselis = Cart::findOrFail($krepselio_id);
            $krepselis->suma += $preke->kaina;
            $krepselis->save();
        }
        else { // Create a new cart
            $user = User::findOrFail(Auth::id());

            $krepselis = new Cart();
            $krepselis->suma = $preke->kaina;
            $krepselis->uzsakymo_nr =  mt_rand();
            $krepselis->naudotojo_id = Auth::id();
            $krepselis->save();

            $user->krepselio_id = $krepselis->id;
            $user->save();
        }

        $krepselio_preke = new CartItem();
        $krepselio_preke->krepselio_id = $krepselis->id;
        $krepselio_preke->prekes_id = $preke->id;
        $krepselio_preke->save();
        session()->put('addedItem', true);
        return Redirect()->route('shop.show', $preke->id);
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
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($cart)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
