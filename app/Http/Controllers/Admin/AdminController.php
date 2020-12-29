<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Agence;
use App\Models\Anomalie;
use App\Models\Client;
use App\Models\Credit;
use App\Models\Deblocage;
use App\Models\Echeance;
use App\Models\Garantie;
use App\Models\Impayee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // public function __construct()
    // {
    //     dd(Auth::check());

    //     if(Auth::user()->roles != '["ROLE_ADMIN"]') {
    //         return false;
    //     }
    // }

    public function index()
    {

        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.index', compact('get_agence'));
    }

    public function information()
    {
        // Get all agence
        $get_agence = Agence::orderBy('nom', 'ASC')->get();

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

        return view('admin.information', compact(
            'get_agence', 'dossier_global', 'sms_global', 'call_global', 'visit_global', 'dossier_agence', 'call_agence', 'sms_agence', 'visit_agence', 'get_all_user'
        ));
    }
    // DOSSIERS
    public function dossier($code_agence = '00001')
    {
//       $folders = Client::join('credits', 'clients.code_client', 'credits.code_client')
//                         ->where('clients.code_agence', $code_agence)->orderBy('code_dossier', 'ASC')->get();
//        $get_agence = Agence::orderBy('nom', 'ASC')->get();
//        return view('admin.dossier', compact( 'get_agence', 'folders', 'code_agence'));
        $get_agence = Agence::orderBy('nom', 'ASC')->get();
        if(Cache::has('get_dossiers')){
            $folders = Cache::get('get_dossiers');
            return view('admin.dossier', compact( 'get_agence', 'folders', 'code_agence'));
        }else{
            $folders = Cache::rememberForever('get_dossiers',  function () use($code_agence){
                return Client::join('credits', 'clients.code_client', 'credits.code_client')
                    ->where('clients.code_agence', $code_agence)->orderBy('code_dossier', 'ASC')->get();
            });
            return view('admin.dossier', compact( 'get_agence', 'folders', 'code_agence'));
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
    //ANOMALIES
    public function anomalie($code_agence)
    {     //dd(Cache::get('get_anomalies'));
           $get_agence = Agence::orderBy('nom', 'ASC')->get();

            $anomalies =Client::join('credits', 'clients.code_client', 'credits.code_client')
                         ->where('clients.code_agence', $code_agence)->get();
            return view('admin.anomalie', compact('anomalies', 'get_agence', 'code_agence'));

    }

    public function utilisateur()
    {
        $users = User::all();

        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.user', compact('users', 'get_agence'));
    }

    public function agence()
    {
        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.agence', compact('get_agence'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.edit_user', compact('user', 'get_agence'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_utilisateur' => 'required|min:3',
            'role' => 'required',
            'password' => 'required|min:6|confirmed'
        ], [
            'nom_utilisateur.required' => "Le nom d'utilisateur est requis",
            'nom_utilisateur.min' => "Minimum 3 caractères",
            'role.required' => "Le role est requis",
            'password.required' => "Le mot de passe est requis",
            'password.min' => "Minimum 6 caractères",
            'password_confirmation.required' => "Le mot de passe est requis",
            'password_confirmation.same' => "Les mot de passe ne sont pas identique"
        ]);

        $data = $request->all();

        $agence = Agence::where('nom', $data['agence'])
                        ->first();

        $format = '["' . $data['role'] . '"]';

        $user = User::findOrFail($id);
        $user->update([
            'nom_utilisateur' => $data['nom_utilisateur'],
            'agence_id' => $agence->id,
            'roles' => $format,
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('utilisateur');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        // $user->destroy($id);

        if($user->destroy($id)) {
            return response()->json([
                'success' => true
            ], 200);
        }
        else {
            return response()->json([
                'success' => false
            ], 404);
        }
    }

    public function add_user_form()
    {
        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.add_user', compact('get_agence'));
    }

    public function add_user(Request $request)
    {
        $this->validate($request, [
            'nom_utilisateur' => 'required|min:3',
            'role' => 'required',
            'agence' => 'required',
            'password' => 'required|min:6|confirmed'
        ], [
            'nom_utilisateur.required' => "Le nom d'utilisateur est requis",
            'nom_utilisateur.min' => "Minimum 3 caractères",
            'role.required' => "Le role est requis",
            'agence.required' => "Le nom de l'agence est requis",
            'password.required' => "Le mot de passe est requis",
            'password.min' => "Minimum 6 caractères",
            'password_confirmation.required' => "Le mot de passe est requis",
            'password_confirmation.same' => "Les mot de passe ne sont pas identique"
        ]);

        $data = $request->all();

        $format = '["' . $data['role'] . '"]';

        $agence = Agence::where('nom', $data['agence'])
                        ->first();

        $insert = User::create([
            'nom_utilisateur' => $data['nom_utilisateur'],
            'agence_id' => $agence->id,
            'roles' => $format,
            'password' => Hash::make($data['password'])
        ]);
        $insert->save();

        return redirect()->route('utilisateur');
    }

    public function save_email(Request $request)
    {
        $data = $request->all();

        $agence = Agence::findOrFail($data['agence_id']);
        $agence->update([
            'email' => $data['email']
        ]);

        if($agence->save()) {
            return response()->json([
                'success' => true
            ], 200);
        }
        else {
            return response()->json([
                'success' => false
            ], 404);
        }
    }

    public function editAccount()
    {
        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.update', compact('get_agence'));
    }

    public function updateAccount(Request $request, $id)
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

            return redirect()->route('dashboard_admin')->with('success', 'Votre mot de passe est changé');
        }
        else {
            return back()->with('error', 'Le mot de passe actuel est incorrect');
        }
    }
}
