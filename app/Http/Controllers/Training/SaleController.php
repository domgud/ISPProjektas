<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SaleController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sale::all();
        return view('Sale.index')->with('sale', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sales = Sale::all();
        $salesNR = $sales->pluck('sales_numeris');

        $data = $request->validate([
            'vietos' => 'required',
            'numeris' => ['required', Rule::notIn($salesNR)],
            'iranga' => 'required'
        ]);

        $item = new Sale();

        $item->vietu_skaicius = $data['vietos'];
        $item->sales_numeris = $data['numeris'];
        $item->turi_iranga = $data['iranga'];
        $item->save();
        return Redirect()->route('Sale.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sales = Sale::find($id);
        $training = Training::all()->where('sales_id', $id);
        return view('Sale.view', ['sal' => $sales, 'tren' => $training]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sale = Sale::all()->where('id', $id)->first();
        return view('Sale.edit', ['sal' => $sale]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales = Sale::all();
        $salesNR = $sales->pluck('sales_numeris');
        $data = $request->validate([
            'vietos' => 'required',
            'numeris' => ['required', Rule::notIn($salesNR)],
            'iranga' => 'required'
        ]);
 
        $item = Sale::findOrFail($id);

        $item->vietu_skaicius = $data['vietos'];
        $item->sales_numeris = $data['numeris'];
        $item->turi_iranga = $data['iranga'];
        $item->save();
        return Redirect()->route('Sale.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);
        $sale->delete();
        return redirect()->route('Sale.index');
    }

    public function delete($id)
    {
        $sale = Sale::findOrFail($id);
        return view('Sale.delete')->with('sal', $sale);
    }
}
