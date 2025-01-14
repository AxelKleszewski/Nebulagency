<?php

namespace App\Http\Controllers;

use App\Models\CommentVoyage;
use Illuminate\Http\Request;

class CommentVoyageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'voyage_id' => 'required|exists:voyages,id',
            'comment' => 'required|string|max:1000',
        ]);

        CommentVoyage::create([
            'user_id' => auth()->id(),
            'voyage_id' => $validated['voyage_id'],
            'comment' => $validated['comment'],
        ]);

        return redirect()->back()->with('success', 'Votre commentaire a été publié.');
    }
}
