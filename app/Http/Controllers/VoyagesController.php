<?php

namespace App\Http\Controllers;

use App\Models\CommentVoyage;
use App\Models\Etape;
use App\Models\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VoyagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $galaxie = urldecode($request->input('galaxie', null));
        $value = $request->cookie('galaxie', null);

        if (!isset($galaxie)) {
            if (!isset($value)) {
                $voyages = Voyage::all();
                $galaxie = "all";
                Cookie::expire('galaxie');
            } else {
                $voyages = Voyage::query()->where('galaxie', $value)->get();
                $galaxie = $value;
                Cookie::queue('galaxie', $galaxie, 10);
            }
        } else {
            if ($galaxie === "all" || $galaxie === "") {
                $voyages = Voyage::all();
                Cookie::expire('galaxie');
            } else {
                $voyages = Voyage::query()->where('galaxie', $galaxie)->get();
                Cookie::queue('galaxie', $galaxie, 10);
            }
        }
        if(Auth::id() !== null)$userVoyages = Voyage::query()->where('user_id', Auth::id())->get();
        else $userVoyages = null;

        $galaxies = Voyage::query()->groupBy('galaxie')->pluck('galaxie');
        return view('voyages.index', compact('voyages', 'galaxie', 'galaxies', 'userVoyages'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $etapes = Etape::all();
        return view('voyages.create', compact('etapes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'description' => 'required|string',
            'duree_jours' => 'required|integer|min:1',
            'galaxie' => 'required|string',
            'etape1' => 'required|integer',
            'etape2' => 'required|integer',
            'etape3' => 'required|integer',
            'etape4' => 'required|integer',
            'etape5' => 'required|integer',
            'prix_euros' => 'required|integer|min:1',
            'en_ligne' => 'required|boolean',
            'visuel' => 'nullable|image',
        ]);

        if ($request->hasFile('visuel')) {
            $file = $request->file('visuel');

            $filename = time() . '_' . $file->getClientOriginalName();
            $customPath = 'images/' . $filename;

            $file->move(public_path('storage/images/'), $filename);
            $validated['visuel'] = $customPath;
        }

        $validated['user_id'] = Auth::id();


        $voyage = Voyage::create($validated);

        for ($i = 1; $i <= 5; $i++) {
            $etape = Etape::find($request->input('etape' . $i));
            $newEtape = $etape->replicate();
            $newEtape->id = count(Etape::all()) + 1;
            $newEtape->voyage_id = $voyage->id;
            $newEtape->save();
        }
        return redirect()->route('voyages.index')->with('success', 'Voyage créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voyage = Voyage::findOrFail($id);

        $comments = CommentVoyage::where('voyage_id', $id)
            ->with('user')
            ->get();
        $count = Voyage::query()
            ->leftJoin('likes', 'voyages.id', '=', 'likes.voyage_id')
            ->select(DB::raw('COUNT(likes.voyage_id) as total_likes'))
            ->groupBy('voyages.id')
            ->orderByDesc('total_likes')
            ->first()["total_likes"];

        return view('voyages.show', compact('voyage', 'comments', 'count'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $voyage = Voyage::findOrFail($id);
        return view('voyages.edit', compact('voyage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'resume' => 'required|string|max:255',
            'description' => 'required|string',
            'duree_jours' => 'required|integer|min:1',
            'galaxie' => 'required|string',
            'prix_euros' => 'required|integer|min:1',
            'en_ligne' => 'required|boolean',
            'visuel' => 'nullable|image',
        ]);

        if ($request->hasFile('visuel')) {
            $path = $request->file('visuel')->store('voyages', 'public');
            $validated['visuel'] = $path;
        }

        $voyage = Voyage::findOrFail($id);
        $voyage->update($validated);

        return redirect()->route('voyages.index')->with('success', 'Voyage modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voyage = Voyage::findOrFail($id);
        $voyage->delete();

        return redirect()->route('voyages.index')->with('success', 'Voyage supprimé avec succès');
    }
}
