<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use Illuminate\Http\Request;
use DB;
use App\Models\Salon;
use App\Models\ServiceType;
use App\Models\User;


class TerminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $termin = Termin::query()->orderByDesc('vrijeme_termina')->paginate(10);
        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();

        return View('termini.index', ["termins"=>$termin],
            compact('termin', 'salons', 'types', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function create()
    {
        $data = request()->validate([
            'datum_termina' => 'required',
            'vrijeme_termina' => 'required',
            'kontakt' => 'required',
            'service_type_id' => 'required',
            'salon_id' => 'required',
        ]);

        Termin::create([
            'datum_termina' => $data['datum_termina'],
            'vrijeme_termina' => $data['vrijeme_termina'],
            'kontakt' => $data['kontakt'],
            'service_type_id' => $data['service_type_id'],
            'salon_id' => $data['salon_id'],
            'user_id' => auth()->user()->id,

        ]);

        return redirect("/termini")->with('success','Uspješno ste dodali novi termin.');

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
     * @param  \App\Models\termin  $termin
     * @return \Illuminate\Http\Response
     */
    public function show(termin $termin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\termin  $termin
     * @return \Illuminate\Http\Response
     */
    public function edit(termin $termin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\termin  $termin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, termin $termin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\termin  $termin
     * @return \Illuminate\Http\Response
     */
    public function destroy(termin $termin)
    {
        //
    }
}