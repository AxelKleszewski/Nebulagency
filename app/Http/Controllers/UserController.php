<?php


namespace App\Http\Controllers;

    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users with their like count.
     */
    public function index()
    {
        $users = User::withCount('likes')->get();
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $utilisateur = User::withCount(['likes', 'avis'])->findOrFail($user->id);
        return view('users.show', compact('utilisateur'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'pseudo' => 'nullable|string|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'pseudo' => $request->pseudo,
        ]);

        return redirect()->route('profile');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'pseudo' => 'nullable|string|max:255',
            'image_url' => 'nullable|url',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'pseudo' => $request->pseudo,
            'image_url' => $request->image_url,
        ]);

        if ($request->password) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return view('showprofile.index', ['user' => $user]);
    }



    /**
     * Remove the specified user from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
