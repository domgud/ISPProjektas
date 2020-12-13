<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\Trainer;
use App\Models\Sale;
use App\Models\Training_type;
use App\Models\Visit;
use App\Models\Client;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;

class TrainingController extends Controller
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
        $items = Training::all();
        return view('Training.index')->with('tren', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $treneriai = Trainer::all();
        $sales = Sale::all();
        $tipai = Training_type::all();
        return view('Training.create', ['treneriai' => $treneriai, 'sales' => $sales, 'tipai' => $tipai]);
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
            'data' => 'date',
            'pavadinimas' => 'required',
            'pradzia' => 'required',
            'pabaiga' => 'required',
            'tipas' => 'required',
            'sale' => 'required'
        ]);

        $item = new Training();

        $item->data = $data['data'];
        $item->pavadinimas = $data['pavadinimas'];
        $item->laikas_nuo = $data['pradzia'];
        $item->laikas_iki = $data['pabaiga'];
        $item->tipas = $data['tipas'];
        $item->sales_id = $data['sale'];
        $item->treneris_id = Auth::user()->trainer->id;

        $item->save();
        return Redirect()->route('Training.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trainings = Training::find($id);
        $sales = Sale::find($trainings->sales_id);
        $tipai = Training_type::find($trainings->tipas);

        return view('Training.inspect', ['tr' => $trainings, 'sales' => $sales, 'tipai' => $tipai]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainings = Training::all()->where('id', $id)->first();
        $sales = Sale::all();
        $tipai = Training_type::all();
        return view('Training.edit', ['training' => $trainings, 'sales' => $sales, 'tipai' => $tipai]);
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
        $data = $request->validate([
            'data' => 'date',
            'pavadinimas' => 'required',
            'pradzia' => 'required',
            'pabaiga' => 'required',
            'tipas' => 'required',
            'sale' => 'required'
        ]);
        $training = Training::findOrFail($id);
        $training->data = $data['data'];
        $training->pavadinimas = $data['pavadinimas'];
        $training->laikas_nuo = $data['pradzia'];
        $training->laikas_iki = $data['pabaiga'];
        $training->tipas = $data['tipas'];
        $training->sales_id = $data['sale'];
        $training->treneris_id = Auth::user()->trainer->id;

        $training->save();
        return Redirect()->route('Training.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $training = Training::findOrFail($id);
        $training->delete();
        return redirect()->route('Training.index');
    }

    public function delete($id)
    {
        $training = Training::findOrFail($id);
        return view('Training.delete')->with('train', $training);
    }

    public function ataskaita($id)
    {
        $trainings = Training::find($id);
        $sales = Sale::find($trainings->sales_id);
        $tipai = Training_type::find($trainings->tipas);
        $AllSales = Sale::all();
        $AllTypes = Training_type::all();
        $pdf = PDF::loadview('Training.ataskaita', ['tr' => $trainings, 'sale' => $sales, 'tipas' => $tipai,'sales' => $AllSales, 'tipai' => $AllTypes ]);
        return $pdf->download('Treniruotes ataskaita.pdf');
    }
}
