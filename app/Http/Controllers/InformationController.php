<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Client;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossier_global = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', '2020-12-01')
                            ->where('actions.created_at', '<=', '2020-12-31')
                            ->count();

                            dd($dossier_global);

        $sms_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', '2020-12-31')
                    ->where('type', 'TYPE_SMS')
                    ->count();

        $call_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', '2020-12-31')
                    ->where('type', 'TYPE_CALL')
                    ->count();

        $visit_global = Action::where('created_at', '>=', '2020-12-06')
                    ->where('created_at', '<=', '2020-12-31')
                    ->where('type', 'TYPE_VISIT')
                    ->count();

        //  INFORMATION PAR AGENCE
        $dossier_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', '2020-12-01')
                            ->where('actions.created_at', '<=', '2020-12-31')
                            ->distinct('clients.code_client')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->count();

        $call_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', '2020-12-01')
                            ->where('actions.created_at', '<=', '2020-12-31')
                            ->where('actions.type', 'TYPE_CALL')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->distinct('clients.code_client')
                            ->count();

        $sms_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                            ->join('actions', 'clients.code_client', 'actions.code_client')
                            ->where('actions.created_at', '>=', '2020-12-01')
                            ->where('actions.created_at', '<=', '2020-12-31')
                            ->where('actions.type', 'TYPE_SMS')
                            ->distinct('clients.code_client')
                            ->where('agences.nom', 'ABENGOUROU')
                            ->count();

        $visit_agence = Client::join('agences', 'clients.code_agence', 'agences.code_agence')
                        ->join('actions', 'clients.code_client', 'actions.code_client')
                        ->where('actions.created_at', '>=', '2020-12-01')
                        ->where('actions.created_at', '<=', '2020-12-31')
                        ->where('actions.type', 'TYPE_VISIT')
                            ->distinct('clients.code_client')
                        ->where('agences.nom', 'ABENGOUROU')
                        ->count();

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
        // 
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
        $data = $request->all();

        // AJOUT DES COMMENTAIRES
        $actions = Action::findOrFail($id);
        $actions->update([
            'commentaire' => $data['commentaire'],
            'created_at' => $data['date_envoi']
        ]);
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
