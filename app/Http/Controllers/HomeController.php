<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\Termin;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function kontakt()
    {
        return View('kontakt');
    }

    public function welcome()
    {
        $salons = Salon::all()->count();
        $users = User::all()->count();
        $termins = Termin::all()->count();

        $showsalons = Salon::query()->orderByDesc('created_at')->take(5)->get();
        $showtermins = Termin::query()->orderByDesc('created_at')->take(5)->get();

        return View('/welcome',
            compact('salons','termins','showsalons', 'showtermins', 'users'));
    }
}
