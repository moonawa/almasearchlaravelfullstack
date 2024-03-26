<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entreprise = Entreprise::orderBy('created_at', 'DESC')->get();
        return view('entreprises.index', compact('entreprise'));
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->findOrFail($id);
        return view('entreprises.show', compact('entreprise'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $entreprise= Entreprise::with('user')->get();
    return view('entreprises.edit', compact('entreprise'));
    }

    public function destroy(string $id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();
        return redirect()->route('entreprise')->with('success', 'Le entreprise a été supprimé');
    }

    public function storefile(Request $request)
    {

        $request->validate([
            'ninea' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',
            'rc' => 'sometimes|mimes:pdf,xlx,csv,docx|max:2048',

        ],);
        if ($request->hasFile('ninea')) {
        $nineaName = time().'.'.$request->ninea->extension();  
        $request->ninea->move(public_path('uploads'), $nineaName);
        }
        if ($request->hasFile('rc')) {
        $rcName = time().'.'.$request->rc->extension();  
        $request->rc->move(public_path('uploads'), $rcName);
        }
        $user = Auth::user();
        $entreprise = Entreprise::where('user_id', $user->id)->firstOrFail();
        $updateData = [];
        if (isset($nineaName)) {
            $updateData['ninea'] = $nineaName;
        }
        if (isset($rcName)) {
            $updateData['rc'] = $rcName;
        }

        $entreprise->update($updateData); 
        return back()->with('success', 'Les fichiers ont  été modifiés avec succès.');
    }
}
