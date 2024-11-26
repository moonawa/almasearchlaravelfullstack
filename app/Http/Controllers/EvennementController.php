<?php

namespace App\Http\Controllers;

use App\Models\Evennement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvennementController extends Controller
{
    public function index()
    {
        $events = Evennement::where('statusevent', "Affiche")->orderBy('created_at', 'DESC')->take(3)->get();
        return view('moonawahome', compact('events'));
    }
    public function indexpublic()
    {
        $events = Evennement::where('statusevent', "Affiche")->orderBy('created_at', 'DESC')->get();
        return view('events.indexpublic', compact('events'));
    }
    public function indexadmin()
    {
        $events = Evennement::orderBy('created_at', 'DESC')->get();
        return view('events.index', compact('events'));
    }
    public function showpublic(string $id)
    {
        $event = Evennement::findOrFail($id);
  
        return view('events.showpublic', compact('event'));
    }
    public function show(string $id)
    {
        $event = Evennement::findOrFail($id);
  
        return view('events.show', compact('event'));
    }
    public function store(Request $request)
    {
        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('uploads'), $photoName);
        }
        $user = Auth::user();
        $event = new Evennement();
        $event->nomevent = $request->nomevent;
        $event->dateevennement = $request->dateevennement;
        $event->lieuevent = $request->lieuevent;
        $event->description = $request->description;
        $event->photo = $photoName;
        $event->statusevent = "Affiche";
        $event->user_id = $user->id;
        $event->save();
        return redirect()->route('events')->with('success', 'Evennement ajouté avec  success');

    }
    public function update(Request $request, string $id)
    {
        $event = Evennement::findOrFail($id);
        $event->update($request->all());
  
        return redirect()->route('events')->with('success', 'Evennement modifié avec success');
    }
    public function destroy(string $id)
    {
        $event = Evennement::findOrFail($id);
        $event->delete();
        return redirect()->route('events')->with('success', 'Evennement supprimé ');
    }
   
}
