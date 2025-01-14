<?php

namespace App\Http\Controllers;

use App\Models\CommentEtape;
use App\Models\CommentVoyage;
use App\Models\Etape;
use App\Models\Media;
use App\Models\Voyage;
use Illuminate\Http\Request;

class EtapeController extends Controller
{

    public function index($voyageId)
    {
        $voyage = Voyage::with('etapes')->findOrFail($voyageId);
        return view('etapesVoyage.index', compact('voyage'));
    }

    public function show($voyageId, $etapeId)
    {

        $comments = CommentEtape::where('etape_id', $etapeId)
            ->with('user')
            ->get();
        $etape = Etape::where('voyage_id', $voyageId)->findOrFail($etapeId);
        $etapePrecedente = $etape->precedent();
        $etapeSuivante = $etape->suivant();
        $medias = $etape->medias;
        return view('etapesVoyage.show', compact('etape', 'medias', 'etapePrecedente', 'etapeSuivante', 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($voyageId)
    {
        $voyage = Voyage::findOrFail($voyageId);
        return view('etapesVoyage.create', compact('voyage'));
    }

    public function store(Request $request, $voyageId)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string',
            'description' => 'nullable|string',
            'debut' => 'required|date',
            'fin' => 'date|after_or_equal:debut',
            'visuel' => 'nullable|image',
        ]);
        $validated['voyage_id'] = $voyageId;
        if ($request->hasFile('visuel')) {
            $file = $request->file('visuel');

            $filename = time() . '_' . $file->getClientOriginalName();
            $customPath = 'images/' . $filename;

            $file->move(public_path('storage/images/'), $filename);
            $validated['visuel'] = $customPath;
        }
        Etape::create($validated);

        return redirect()->route('etapesVoyage.index', $validated['voyage_id'])
            ->with('success', 'Étape ajoutée avec succès.');
    }

    public function medias() {
        return $this->hasMany(Media::class);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($voyageId, $etapeId)
    {
        $voyage = Voyage::findOrFail($voyageId);
        $etape = Etape::where('voyage_id', $voyageId)->findOrFail($etapeId);
        return view('etapesVoyage.edit', compact('voyage', 'etape'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $voyageId, $etapeId)
    {
        $validated = $request->validate([
            'titre' => 'string|max:255',
            'resume' => 'string',
            'description' => 'nullable|string',
            'debut' => 'date',
            'fin' => 'required|date|after_or_equal:debut',
        ]);
        $medias = Etape::query()->inRandomOrder()->pluck('visuel')->first();
        $validated['visuel'] = $medias;

        Etape::create($validated);
        return redirect()->route('etapesVoyage.index', ['voyageId' => $voyageId])
            ->with('success', 'Étape ajoutée avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etape = Etape::findOrFail($id);
        $voyageId = $etape->voyage_id; // Retrieve the associated voyage ID
        $etape->delete();

        return redirect()->route('etapesVoyage.index', ['voyageId' => $voyageId])
            ->with('success', 'Étape supprimée avec succès.');
    }

}
