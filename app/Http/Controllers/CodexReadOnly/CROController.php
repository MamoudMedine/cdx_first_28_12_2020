<?php

namespace App\Http\Controllers\CodexReadOnly;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Agence;
use App\Models\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CROController extends Controller
{
    public function index()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex_read_only.index', compact('get_agence'));
    }

    public function information()
    {
        // Get all agence
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        // Get last day of actual month
        $last_day = date("Y-m-d", mktime(0, 0, 0, date("m")+1, 0));

        // Get first day of actual month
        $first_day = date("Y-m-d", mktime(0, 0, 0, date("m"), 1));

        $dossier_global = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->count();

        $sms_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', $last_day)
                    ->where('type', 'TYPE_SMS')
                    ->count();

        $call_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', $last_day)
                    ->where('type', 'TYPE_CALL')
                    ->count();

        $visit_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', $last_day)
                    ->where('type', 'TYPE_VISIT')
                    ->count();


        //  INFORMATION PAR AGENCE
        $dossier_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->distinct('clients.code_client')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->count();

        $call_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->where('actions.type', 'TYPE_CALL')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->distinct('clients.code_client')
                            ->count();

        $sms_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', $first_day)
                            ->where('actions.created_at', '<=', $last_day)
                            ->where('actions.type', 'TYPE_SMS')
                            ->distinct('clients.code_client')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->count();

        $visit_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                        ->join('actions', 'clients.code_client', 'actions.code_client')
                        ->where('actions.created_at', '>=', $first_day)
                        ->where('actions.created_at', '<=', $last_day)
                        ->where('actions.type', 'TYPE_VISIT')
                            ->distinct('clients.code_client')
                        ->where('agences.nom', 'ABENGOUROU')
                        ->count();

        $get_all_user = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                        ->join('credits', 'clients.code_client', 'credits.code_client')
                        ->join('echeances', 'credits.code_dossier', 'echeances.code_dossier')
                        ->join('impayes', 'credits.code_dossier', 'impayes.code_dossier')
                        ->join('anomalies', 'credits.code_dossier', 'anomalies.code_dossier')
                        ->get();

        return view('codex_read_onlyinformation', compact(
            'get_agence', 'dossier_global', 'sms_global', 'call_global', 'visit_global', 'dossier_agence', 'call_agence', 'sms_agence', 'visit_agence', 'get_all_user'
        ));
    }

    public function dossier()
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

        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex_read_onlydossier', compact('folders', 'get_agence'));
    }

    public function anomalie()
    {
        $anomalie = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
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

        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex_read_onlyanomalie', compact('anomalie', 'get_agence'));
    }

    public function edit()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex_read_only.update', compact('get_agence'));
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

            return redirect()->route('dashboard_cro')->with('success', 'Votre mot de passe est changé');
        }
        else {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }
    }
}
