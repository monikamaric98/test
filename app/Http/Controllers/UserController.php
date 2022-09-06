<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(auth()->user()->role != "Superadmin"){
            abort('403', 'Nema pristupa ovom dijelu sustava!');
        }
        $user = User::with('salons')->orderByDesc('created_at')->paginate(10);
        $salons = Salon::all();
        $number = User::query()->count();

        return view('korisnici.index', ["users"=>$user], compact('salons','number'));
    }


    public function userdelete(User $user)
    {
        return view("korisnici.showdelete", compact('user'));
    }


    public function deleteuser($id)
    {
        DB::table('users')->where("id", $id)->delete();

        return redirect('/korisnici')->with('success', 'Uspješno ste obrisali korisnika.');
    }


    public function search(Request $request)
    {
        if (auth()->user()->role != "Superadmin"){
            abort('403', 'Samo superadmin ima pristup ovom dijelu sustava.');
        }
        $search = $request->input('search');

        $users = User::query()
            ->with('salons')
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orderByDesc('id')
            ->paginate(10);
        $salons = Salon::all();


        return view('korisnici.search', compact('users', 'search', 'salons'));
    }


    public function addUser(Request $request)
    {
        $podaci = $request->all();

        $validator = Validator::make($podaci, [
            'name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect('/korisnici')->withErrors($validator)->withInput();

        } else {
            User::create([
                'name' => $podaci['name'],
                'email' => $podaci['email'],
                'password' => Hash::make($podaci['password']),
            ]);
            return redirect("/korisnici")->with('success','Uspješno ste dodali novog korisnika.');
        }
    }

    public function editrole(User $user)
    {
       if(auth()->user()->role != "Superadmin"){
            return abort('403', "Niste Admin!");
        }
        return view("korisnici.rolechange", compact('user'));
    }

    public function changerole(Request $request, $id)
    {

        $user = User::find($id);

        $user->role = $request->input('role');

        $user->update();

        return redirect("/korisnici")->with('success', 'Uspješno ste promijenili ulogu korisnika.');

    }

}
