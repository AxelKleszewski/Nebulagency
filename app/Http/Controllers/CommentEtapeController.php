<?php

namespace App\Http\Controllers;

use App\Models\CommentEtape;
use Illuminate\Http\Request;

class CommentEtapeController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'etape_id' => 'required|exists:etapes,id',
            'comment' => 'required|string|max:1000',
        ]);

        CommentEtape::create([
            'user_id' => auth()->id(),
            'etape_id' => $validated['etape_id'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('success', 'Votre commentaire a été publié.');
    }
}
