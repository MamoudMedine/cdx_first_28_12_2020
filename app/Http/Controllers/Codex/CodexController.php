<?php

namespace App\Http\Controllers\Codex;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Agence;
use App\Models\Anomalie;
use App\Models\Client;
use App\Models\Deblocage;
use App\Models\Echeance;
use App\Models\Garantie;
use App\Models\Impayee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class CodexController extends Controller
{

    public function index()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex.index', compact('get_agence'));
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

        return view('codex.information', compact(
            'get_nom_agence', 'dossier_agence', 'call_agence', 'sms_agence', 'visit_agence', 'get_user_by_agence'
        ));
    }

    // DOSSIERS
    public function dossier()
    {
//       $folders = Client::join('credits', 'clients.code_client', 'credits.code_client')
//                         ->where('clients.code_agence', $code_agence)->orderBy('code_dossier', 'ASC')->get();
//        $get_agence = Agence::orderBy('nom', 'ASC')->get();
//        return view('codex.dossier', compact( 'get_agence', 'folders', 'code_agence'));
        $agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();
        $get_agence = Agence::orderBy('nom', 'ASC')->get();
        if(Cache::has('get_dossiers_codex')){
            $folders = Cache::get('get_dossiers_codex');
            return view('codex.dossier', compact( 'get_agence', 'agence','folders'));
        }else{
            $folders = Cache::rememberForever('get_dossiers_codex',  function () use($agence){
                return Client::join('credits', 'clients.code_client', 'credits.code_client')
                    ->where('clients.code_agence', $agence->code_agence)
                    ->distinct('clients.nom_client')
                    ->orderBy('code_dossier', 'ASC')->get();
            });
            return view('codex.dossier', compact( 'get_agence', 'agence','folders'));
        }
    }

    public function get_dossiers()
    {
        //$folders = Client::where('code_agence', '00001')->get();
        $folders = Client::join('credits', 'clients.code_client', 'credits.code_client')
            ->where('clients.code_agence', '00001')->get();
        return response()->json(['dossiers' => $folders]);
    }
    // DETAIL DEBLOCAGE
    public function get_deblocages()
    {
        $code_dos = request('code_dos');
        $deb = Deblocage::where('code_dossier', $code_dos)->orderBy('date_deblocage', 'ASC')->get();
        if ($deb){
            return response()->json(['success'=>true, 'deblocage' => $deb]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
    // DETAIL ECHEANCES
    public function get_echeances()
    {
        $code_dos = request('code_dos');
        $ech = Echeance::where('code_dossier', $code_dos)->orderBy('date_echeance', 'ASC')->get();
        if ($ech){
            return response()->json(['success'=>true, 'echeances' => $ech]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
    // DETAIL GARANTIE
    public function get_garanties()
    {
        $code_dos = request('code_dos');
        $gar = Garantie::where('code_dossier', $code_dos)->get();
        if ($gar){
            return response()->json(['success'=>true, 'garanties' => $gar]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
    // DETAIL IMPAYEES
    public function get_impayes()
    {
        $code_dos = request('code_dos');
        $imp = Impayee::where('code_dossier', $code_dos)->get();
        if ($imp){
            return response()->json(['success'=>true, 'impayes' => $imp]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
    // DETAIL ACTIONS
    public function get_actions()
    {
        $code_dos = request('code_dos');
        $act = Action::where('code_dossier', $code_dos)->get();
        if ($act){
            return response()->json(['success'=>true, 'actions' => $act]);
        }else {
            return response()->json(['success'=>false]);
        }
    }
    // DETAIL ANOMALIES
    public function get_anomalies()
    {
        $code_dos = request('code_dos');
        $an = Anomalie::where('code_dossier', $code_dos)->get();
        if ($an){
            return response()->json(['success'=>true, 'anomalies' => $an]);
        }else {
            return response()->json(['success'=>false]);
        }
    }

    public function edit()
    {
        $get_agence = User::join('agences', 'users.agence_id', 'agences.id')
                    ->where('users.id', Auth::user()->id)
                    ->first();

        return view('codex.update', compact('get_agence'));
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

            return redirect()->route('dashboard_codex')->with('success', 'Votre mot de passe est changé');
        }
        else {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }
    }
}
