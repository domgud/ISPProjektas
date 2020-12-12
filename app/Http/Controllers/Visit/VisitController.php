<?php

namespace App\Http\Controllers\Visit;

use App\Http\Controllers\Controller;
use App\Mail\TrainingRegisterMail;
use App\Models\Email_letter;
use App\Models\Trainer;
use App\Models\Training;
use App\Models\Visit;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class VisitController extends Controller
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
        $client = Auth::user()->client;
        $visits = Visit::all()->where('client_id', $client->id);

        return view('visit.index')->with('visits', $visits);
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

    public function createVisit($visit)
    {
        return view('visit.create', compact('visit'));
    }

    public function search(Request $request)
    {
        $client = Auth::user()->client;
        $visits = Visit::all()->where('client_id', $client->id);
        $id_array = [];

        foreach ($visits as $key => $visit)
        {
            $id_array = Arr::add($id_array, $key, $visit->treniruote_id);
        }

        $selectedTrainer = null;
        $trainers = Trainer::all();
        $trainings = Training::all()->whereNotIn('id', $id_array);

        if ($request->treneris != null && $request->treneris != 'all')
        {
            $selectedTrainer = $request->treneris;
            $trainings = Training::all()->where('treneris_id', $selectedTrainer)->whereNotIn('id', $id_array);
        }

        return view('visit.register')->with('trainers', $trainers)->with('selectedTrainer', $selectedTrainer)->with('trainings', $trainings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = Auth::user()->client;

        if($request->validate([
            'tikslas' => ['required', 'min:1', 'max:255']
        ]))
        {
            Visit::create([
                'sukurimo_data' => date("Y-m-d", time()),
                'client_id' => $client->id,
                'tikslas' => $request->tikslas,
                'treniruote_id' => $request->id
            ]);

            $treniruote = Training::findOrFail($request->id);

            $tekstas = 'Jūs užsiregistravote į treniruotę "'.$treniruote->pavadinimas.'".';

            Email_letter::create([
                'sukurimo_data' => Carbon::now(),
                'tekstas' => $tekstas,
                'adresas' => Auth::user()->email
            ]);

            Mail::to(Auth::user())->send(new TrainingRegisterMail($treniruote->pavadinimas));
        }

        return redirect()->route('visit.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function show(Visit $visit)
    {
        return view('visit.view')->with('visit', $visit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function edit(Visit $visit)
    {
        $client = Auth::user()->client;
        $allVisits = Visit::all()->where('client_id', $client->id);
        $id_array = [];

        foreach ($allVisits as $key => $data)
        {
            if ($data->treniruote_id != $visit->treniruote_id)
            {
                $id_array = Arr::add($id_array, $key, $data->treniruote_id);
            }
        }

        $trainings = Training::all()->whereNotIn('id', $id_array);

        return view('visit.edit', compact('visit','trainings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visit $visit)
    {
        if($request->validate([
            'tikslas' => ['required', 'min:1', 'max:255']
        ]))
        {
            $visit->tikslas = $request->tikslas;
            $visit->treniruote_id = $request->treniruote;
            $visit->save();
        }

        return redirect()->route('visit.index');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function delete(Visit $visit)
    {
        return view('visit.delete')->with('visit', $visit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visit  $visit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visit $visit)
    {
        $visit->delete();

        return redirect()->route('visit.index');
    }
}
