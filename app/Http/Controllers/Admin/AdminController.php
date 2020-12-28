<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Action;
use App\Models\Agence;
use App\Models\Client;
use App\Models\Credit;
use App\Models\Deblocage;
use App\Models\Echeance;
use App\Models\Impayee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function dossier()
    {
       $folders = Client::join('credits', 'clients.code_client', 'credits.code_client')
                         ->where('clients.code_agence', '00001')->get();
        //$folders = DB::table('clients')->get();
        $get_agence = Agence::orderBy('nom', 'ASC')->get();
        return view('admin.dossier', compact( 'get_agence', 'folders'));
    }

    public function get_dossiers()
    {
        //$folders = Client::where('code_agence', '00001')->get();
        $folders = Client::join('credits', 'clients.code_client', 'credits.code_client')
                                ->where('clients.code_agence', '00001')->get();
        return response()->json(['dossiers' => $folders]);
    }

    public function get_deblocages()
    {
        $code_dos = request('code_dos');
        $deb = Deblocage::where('code_dossier', $code_dos)->orderBy('date_deblocage', 'DESC')->get();
        if ($deb){
            return response()->json(['success'=>true, 'deblocage' => $deb]);
        }else {
            return response()->json(['success'=>false]);
        }
    }

    public function anomalie()
    {
        $anomalies = Client::join('anomalies', 'clients.code_client', 'anomalies.code_client')
                   ->where('clients.code_agence', '00001')->get();
        //$anomalie = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                    //->join('credits', 'clients.code_client', 'credits.code_client')
                    //->join('echeances', 'credits.code_dossier', 'echeances.code_dossier')
                    //->join('impayes', 'credits.code_dossier', 'impayes.code_dossier')
                    //->join('anomalies', 'credits.code_dossier', 'anomalies.code_dossier')
                    //->get();

        // $files = Client::join('actions', 'clients.code_client', 'actions.code_client')
        //                 ->join('agences', 'clients.code_agence', 'agences.code_agence')
        //                 ->join('credits', 'clients.code_client', 'credits.code_client')
        //                 ->join('credits', 'agences.code_agence', 'credits.code_agence')
        //                 ->join('garanties', 'clients.code_client', 'garanties.code_client')
        //                 ->join('deblocages', 'echeances.code_echeance', 'deblocages.code_echeance')
        //                 ->join('anomalies', 'clients.code_client', 'anomalies.code_client')
        //                 ->join('impayes', 'agences.code_agence', 'impayes.code_agence');

        $get_agence = Agence::orderBy('nom', 'ASC')->get();

        return view('admin.anomalie', compact('anomalies', 'get_agence'));
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