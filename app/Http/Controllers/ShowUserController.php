<?php

namespace App\Http\Controllers;

use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Foundation\Application;

class ShowUserController extends Controller
{
    public function showprofile(): View|Factory|Application
    {
      $user = auth()->user();
      return view('showprofile.index', compact('user'));
    }


}
