<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\HelloMail;
use Illuminate\Support\Facades\Mail;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //retourne la page home
    public function index()
    {
        $users=User::get()->count();
        return view('admin.home',compact('users'));
    }

    //retourne la page users avec filtre
    public function allusers(Request $request)
    {
        $query = User::query();

        // Filtrer par nom
        if ($request->has('name') && !empty($request->input('name'))) {
            $query->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        // Filtrer par rôle
        if ($request->has('role') && $request->input('role') !== null) {
            $query->where('role', $request->input('role'));
        }

        $users = $query->get();

        return view('admin.users', compact('users'));
    }

    //retourne la page adduser
    public function add()
    {
        return view('admin.adduser');
    }

    //ajouter utilisateur
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'adresse' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'specialite' => 'nullable|string|max:255',
            'role' => 'required',
        ]);
    
        // Création de l'utilisateur avec le mot de passe hashé
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']), 
            'adresse' => $validatedData['adresse'],
            'phone' => $validatedData['phone'],
            'specialite' => $validatedData['specialite'],
            'role' => $validatedData['role'],
        ]);
    
        if ($user) {
            try {
                Mail::to($user->email)->send(new HelloMail($user, $validatedData['password']));
                return redirect()->back()->with('success', 'Utilisateur ajouté avec succès et e-mail envoyé !');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Utilisateur ajouté, mais l\'e-mail n\'a pas pu être envoyé. Erreur : ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'Utilisateur non ajouté !');
        }
    }

    //modifier utilisateur
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'string|max:255',
        'email' => 'email|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
        'adresse' => 'string|max:255',
        'phone' => 'string|max:20',
        'specialite' => 'string|max:255',
        'role' => 'required',
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $user = User::findOrFail($id);

    $user->name = $request->input('name');
    $user->email = $request->input('email');
    if ($request->input('password')) {
        $user->password = bcrypt($request->input('password'));
    }
    $user->adresse = $request->input('adresse');
    $user->phone = $request->input('phone');
    $user->specialite = $request->input('specialite');
    $user->role = $request->input('role');

    // Handle profile image upload
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->img = $imageName;
    }

    $user->save();

    return redirect()->back()->with('success', 'Utilisateur mis à jour avec succès');
}


//supprimer utilisateur
public function destroy($id)
{
    $user = User::find($id);
    if ($user) {
        $user->delete();
        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    } else {
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }
}

//retourne la page adduser
public function modifier($id)
{
    $user = User::findOrFail($id);
    return view('admin.settings', compact('user'));
}



}
