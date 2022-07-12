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

    /*
    public function search(Request $request)
    {
        if (auth()->user()->role != "Admin"){
            abort('403', 'Samo admin ima pristup ovom dijelu sustava.');
        }
        $search = $request->input('search');

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orderByDesc('id')
            ->get();

        return view('korisnici.search', compact('users', 'search'));
    } */


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

    /*
    public function edit(User $user)
    {
        if(auth()->user()->id !== $user->id){
            return abort('403', "Niste vlasnik profila!");
        }
        return view("korisnici.profiledit", compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->location = $request->input('location');


        if (request()->hasFile('profile_image')) {
            $imagePath = request('profile_image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $user->profile_image = $imagePath;

        }

        $user->update();

        return redirect("/profile{$user->id}")->with('success', 'Uspješno ste uredili svoje informacije.');

    }
    */

    public function editrole(User $user)
    {
       /* if(auth()->user()->role != "Admin"){
            return abort('403', "Niste Admin!");
        }*/
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
