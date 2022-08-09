<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;

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
            'image' => ['required','image'],
        ]);

        $imagePath = (request('image')->store('uploads', 'public'));

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
        $image->save();

        Salon::create([
            'naziv' => $data['naziv'],
            'kontakt' => $data['kontakt'],
            'lokacija' => $data['lokacija'],
            'user_id' => auth()->user()->id,
            'image' => $imagePath,

        ]);

        return redirect("/saloni")->with('success','Uspješno ste dodali novi salon.');

    }

    public function show(Salon $salon)
    {
        $user = User::all()->where('id', '=', $salon->user_id );

        return view('Saloni.salon',
            compact('salon', 'user')
        );
    }

    public function edit(Salon $salon)
    {

        if(auth()->user()->id !== $salon->user_id && auth()->user()->role !== 'Superadmin' && !(Gate::allows('delete-posts'))){
            return abort('403', "Niste vlasnik salona ili superadmin!");
        }
        return view('Saloni.editsalon',
            compact('salon')
        );
    }


    public function update(Request $request, $id)
    {
        $salon = Salon::find($id);
        $salon->naziv= $request->input('naziv');
        $salon->kontakt= $request->input('kontakt');
        $salon->lokacija= $request->input('lokacija');

        if($request->hasFile('image')){
            $imagePath = request('image')->store('uploads', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200,1200);
            $image->save();

            $salon->image = $imagePath;

        }

        $salon->update();


        return redirect("/saloni{$salon->id}")->with('success','Uspješno ste uredili salon.');
    }



    public function delete($id)
    {
        $salon = Salon::find($id);

        if (auth()->user()->id !== $salon->user_id && auth()->user()->role !== 'Superadmin' && !(Gate::allows('delete-posts'))) {
            abort('403', "Niste vlasnik salona ili superadmin!");
        }

        DB::table('salons')->where("id", $id)->delete();
        return redirect('/saloni')->with('success', 'Uspješno ste obrisali salon');
    }
}
