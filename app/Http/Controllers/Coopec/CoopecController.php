<?php

namespace App\Http\Controllers\Coopec;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CoopecController extends Controller
{
    public function index()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('coopec.index', compact('get_agence'));
    }

    public function information()
    {
        // Get last day of actual month
        $last_day = date("Y-m-d", mktime(0, 0, 0, date("m")+1, 0));

        // Get first day of actual month
        $first_day = date("Y-m-d", mktime(0, 0, 0, date("m"), 1));

        $get_nom_agence = User::join('agences', 'users.agence_id', 'agences.id')
                            ->where('users.id', Auth::user()->id)
                            ->first();

        //  INFORMATION PAR AGENCE
        $dossier_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->distinct('clients.code_client')
                            ->where('agences.nom', $get_nom_agence->nom)
                            ->count();

        $call_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->where('actions.type', 'TYPE_CALL')
                            ->where('agences.nom', $get_nom_agence->nom)
                            ->distinct('clients.code_client')
                            ->count();

        $sms_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->where('actions.type', 'TYPE_SMS')
                            ->distinct('clients.code_client')
                            ->where('agences.nom', $get_nom_agence->nom)
                            ->count();

        $visit_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                        ->join('actions', 'clients.code_client', 'actions.code_client')
                        ->where('actions.created_at', '>=', $first_day)
                        ->where('actions.created_at', '<=', $last_day)
                        ->where('actions.type', 'TYPE_VISIT')
                            ->distinct('clients.code_client')
                        ->where('agences.nom', $get_nom_agence->nom)
                        ->count();

        $get_user_by_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                        ->join('credits', 'clients.code_client', 'credits.code_client')
                        ->join('echeances', 'credits.code_dossier', 'echeances.code_dossier')
                        ->join('impayes', 'credits.code_dossier', 'impayes.code_dossier')
                        ->join('anomalies', 'credits.code_dossier', 'anomalies.code_dossier')
                        ->where('agences.nom', $get_nom_agence->nom)
                        ->get();

        return view('coopec.information', compact(
            'get_nom_agence', 'dossier_agence', 'call_agence', 'sms_agence', 'visit_agence', 'get_user_by_agence'
        ));
    }

    public function anomalie()
    {
        $folders = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                    ->join('credits', 'clients.code_client', 'credits.code_client')
                    ->join('echeances', 'credits.code_dossier', 'echeances.code_dossier')
                    ->join('impayes', 'credits.code_dossier', 'impayes.code_dossier')
                    ->join('anomalies', 'credits.code_dossier', 'anomalies.code_dossier')
                    ->get();

        // $files = Client::join('actions', 'clients.code_client', 'actions.code_client')
        //                 ->join('agences', 'clients.code_agence', 'agences.code_agence')
        //                 ->join('credits', 'clients.code_client', 'credits.code_client')
        //                 ->join('credits', 'agences.code_agence', 'credits.code_agence')
        //                 ->join('garanties', 'clients.code_client', 'garanties.code_client')
        //                 ->join('deblocages', 'echeances.code_echeance', 'deblocages.code_echeance')
        //                 ->join('anomalies', 'clients.code_client', 'anomalies.code_client')
        //                 ->join('impayes', 'agences.code_agence', 'impayes.code_agence');

        $get_nom_agence = User::join('agences', 'users.agence_id', 'agences.id')
                            ->where('users.id', Auth::user()->id)
                            ->first();

        return view('coopec.anomalie', compact('folders', 'get_nom_agence'));
    }

    public function edit()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('coopec.update', compact('get_agence'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password'
        ], [
            'password.required' => "Le mot de passe est requis",
            'new_password.required' => "Le mot de passe est requis",
            'new_password.min' => "Minimum 6 caractères",
            'password_confirmation.required' => "Le mot de passe est requis",
            'password_confirmation.same' => "Les mot de passe ne sont pas identique",
        ]);

        $data = $request->all();

        $user = User::findOrFail($id);

        if(Hash::check($data['password'], $user->password)) {
            $user->update([
                'password' => Hash::make($data['new_password']),
            ]);

            return redirect()->route('dashboard_coopec')->with('success', 'Votre mot de passe est changé');
        }
        else {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }
    }
}
