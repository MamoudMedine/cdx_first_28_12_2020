<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'nom_utilisateur' => 'required|min:3',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        ], [
            'nom_utilisateur.required' => 'Le nom d\'utilisateur est requis',
            'nom_utilisateur.min' => 'Minimum 3 caractères',
            'password.required' => 'Le mot de passe est requis',
            'password.min' => 'Minimum 6 caractères',
            'password_confirmation.required' => 'Le mot de passe est requis',
            'password_confirmation.same' => 'Les mot de passe ne sont pas identique',
        ]);

        if($data['role'] == 'Codex') {
            $format_data = ["ROLE_CODEX"];
        }
        else if($data['role'] == 'Coopec') {
            $format_data = ["ROLE_COOPEC"];
        }
        else if($data['role'] == 'Admin') {
            $format_data = ["ROLE_ADMIN"];
        }
        else if($data['role'] == 'Codex Read Oonly') {
            $format_data = ["ROLE_ADMIN_READ_ONLY"];
        }

        $format_data = $data['role'];

        $insert = User::create([
            'nom_utilisateur' => $data['nom_utilisateur'],
            'agence_id' => $data['agence'],
            'roles' => $format_data,
            'password' => Hash::make($data['password']),
        ]);
        $insert->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
