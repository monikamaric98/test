<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;

class SalonController extends Controller
{
    public function index()
    {
        $salon = Salon::query()->orderByDesc('created_at')->paginate(10);

        return View('Saloni.index', ["salons"=>$salon], compact('salon'));
    }

    public function add()
    {
        $data = request()->validate([
            'naziv' => 'required',
            'kontakt' => 'required',
            'lokacija' => 'required',
            //'image' => ['required','image'],
        ]);

        /*$imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();*/

        Salon::create([
            'naziv' => $data['naziv'],
            'kontakt' => $data['kontakt'],
            'lokacija' => $data['lokacija'],
            'user_id' => auth()->user()->id,
            //'image' => $imagePath,

        ]);

        return redirect("/saloni")->with('success','Uspješno ste dodali novi salon.');

    }
}
