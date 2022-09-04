<?php

namespace App\Http\Controllers;

use App\Models\Termin;
use Illuminate\Http\Request;
use DB;
use App\Models\Salon;
use App\Models\ServiceType;
use App\Models\User;
use Illuminate\Support\Facades\Gate;



class TerminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $termin = Termin::query()
            ->where('datum_termina', '>=', \Carbon\Carbon::now())
            ->orderBy('datum_termina')->orderBy('vrijeme_termina')
            ->paginate(10);
        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();

        return View('termini.index', ["termins"=>$termin],
            compact('termin', 'salons', 'types', 'users'));
    }

    public function mojitermini()
    {
        if(auth()->user()->role != "Vlasnik"){
            abort('403', 'Nemate pristup ovom dijelu sustava!');
        }

        $salons = Salon::query()->where('user_id', '=', auth()->user()->id)->get();

        $termin = Termin::query()
            ->where('datum_termina', '>=', \Carbon\Carbon::now())
            ->orderBy('datum_termina')
            ->orderBy('vrijeme_termina')->paginate(10);

        $types = ServiceType::all();
        $users = User::all();
        return View('mojitermini.index', ["termins"=>$termin],
            compact('termin', 'types', 'users', 'salons'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $terminsz = Termin::query()
            ->where('salon_id', 'LIKE', "%{$search}%")
            ->orderByDesc('datum_termina')
            ->get();

        $termins = Termin::whereHas('salons', function($q) use($search) {
        $q->where('naziv', 'like', '%' . $search . '%');
        })->orderByDesc('datum_termina')->get();

        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();

        return view('termini.search',   compact('termins', 'salons', 'types', 'users', 'search'));
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
            'service_type_id' => 'required',
            'salon_id' => 'required',
        ]);

        Termin::create([
            'datum_termina' => $data['datum_termina'],
            'vrijeme_termina' => $data['vrijeme_termina'],
            //'kontakt' => $data['kontakt'],
            'service_type_id' => $data['service_type_id'],
            'salon_id' => $data['salon_id'],
            //'salon_id' => auth()->user()->salon_id,
            //'user_id' => auth()->user()->id,

        ]);

        return redirect("/mojitermini")->with('success','Uspješno ste dodali novi termin.');

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

    public function termindelete(Termin $termin)
    {
        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();
        return view("termini.deletetermin", compact('termin', 'salons', 'types', 'users'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\termin  $termin
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $termin = Termin::find($id);

        if (auth()->user()->id !== $termin->user_id
            && auth()->user()->role !== 'Superadmin'
            && auth()->user()->role !== 'Vlasnik'
            && !(Gate::allows('delete-posts'))) {
            abort('403', "Nemate ovlasti za brisanje ovog termina!");
        }

        DB::table('termins')->where("id", $id)->delete();
        return redirect('/termini')->with('success', 'Uspješno ste obrisali termin');
    }

    public function taketermin(Termin $termin)
    {
        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();
        return view("termini.taketermin", compact('termin', 'salons', 'types', 'users'));
    }

    public function changeIsAvailable(Request $request, $id)
    {
        $termin = Termin::find($id);
        $termin->isAvailable = 1;
        $termin->user_id = auth()->user()->id;
        $termin->kontakt = $request->input('kontakt');

        $termin->update();

        return redirect('/termini')->with('success', 'Uspješno ste zauzeli ovaj termin.');
    }

    public function otkazitermin(Termin $termin)
    {
        $salons = Salon::all();
        $types = ServiceType::all();
        $users = User::all();
        return view("termini.otkazitermin", compact('termin', 'salons', 'types', 'users'));
    }

    public function changeAvailability($id)
    {

        $termin = Termin::find($id);
        $termin->isAvailable = 0;
        $termin->user_id = NULL;
        $termin->kontakt = NULL;
        $termin->save();

        return redirect('/termini')->with('success', 'Uspješno ste ozkazali ovaj termin.');
    }
}
