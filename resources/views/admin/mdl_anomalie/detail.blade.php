<div class="modal fade" id="anom_detail_mdl" role="dialog">
    <div class="modal-dialog"  style="min-width: 1000px!important;">
        <!-- Modal content-->
        <div class="modal-content">
            @csrf
            <input type="hidden" class="adm_anom_det_cod_dos">
            <input type="hidden" class="get_echeance_url" value="{{route('get_echeances')}}">
            <input type="hidden" class="get_garantie_url" value="{{route('get_garanties')}}">
            <input type="hidden" class="get_impaye_url" value="{{route('get_impayes')}}">
            <input type="hidden" class="get_action_url" value="{{route('get_actions')}}">
            <input type="hidden" class="get_anomalie_url" value="{{route('get_anomalies')}}">
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <h4 class="modal-title">Modal Header</h4>--}}
{{--            </div>--}}
            <div class="modal-body">
                <h3 style="color: red;">Client</h3>
                <div class="row mg-b-10">
                    <div class="col-md-4">
                        <span><b>Code client:</b>&nbsp;</span><span class="mdl_anom_det_cod_clt"></span><br>
                        <span><b>Non du client:</b>&nbsp;</span><span class="mdl_anom_det_nom_clt"></span><br>
                        <span><b>Adresse du client:</b>&nbsp;</span><span class="mdl_anom_det_adr_clt"></span><br>
                        <span><b>Numéro d'identité:</b>&nbsp;</span><span class="mdl_anom_det_cni_clt"></span><br>
                    </div>
                    <div class="col-md-4">
                        <span><b>Telephone:</b>&nbsp;</span><span class="mdl_anom_det_tel_clt"></span><br>
                        <span><b>Situation matrimoniale:</b>&nbsp;</span><span class="mdl_anom_det_sit_clt"></span><br>
                        <span><b>Date de naissance:</b>&nbsp;</span><span class="mdl_anom_det_naiss_clt"></span><br>
                        <span><b>Sexe ou genre:</b>&nbsp;</span><span class="mdl_anom_det_sex_clt"></span><br>
                    </div>
                    <div class="col-md-4">
                        <span><b>Code agence:</b>&nbsp;</span><span class="mdl_anom_det_cag_clt"></span><br>
                        <span><b>Pays de residence du client:</b>&nbsp;</span><span class="mdl_anom_det_pres_clt"></span><br>
                        <span><b>Pays de nationalité du client:</b>&nbsp;</span><span class="mdl_anom_det_pnat_clt"></span><br>
                        <span><b>Nom de la mere:</b>&nbsp;</span><span class="mdl_anom_det_mere_clt"></span><br>
                    </div>
                </div>
                <h3 style="color: red;">Credit</h3>
                <div class="row">
                    <div class="col-md-6">
                        <span><b>Numero de compte du client:</b>&nbsp;</span><span class="mdl_anom_det_numcpt_clt"></span><br>
                        <span><b>Capital initial:</b>&nbsp;</span><span class="mdl_anom_det_cap_init"></span><br>
                        <span><b>Encours du credit:</b>&nbsp;</span><span class="mdl_anom_det_enc_crd"></span><br>
                    </div>
                    <div class="col-md-6">
                        <span><b>Capital total amorti:</b>&nbsp;</span><span class="mdl_anom_det_cap_tot_am"></span><br>
                        <span><b>Capital restant à amorti:</b>&nbsp;</span><span class="mdl_anom_det_cap_res_am"></span><br>
                        <span><b>Durée du prêt:</b>&nbsp;</span><span class="mdl_anom_det_du_prt"></span><br>
                    </div>
                </div>
                <div class="row align-center" style="margin-top:5px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" style="font-weight: bold;" href="#deblocage">Deblocage</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" class="adm_anom_ech_tab" href="#echeance">Echeance</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" class="adm_anom_gar_tab" href="#garantie">Garantie</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" class="adm_anom_imp_tab" href="#impayes">Impayes</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" class="adm_anom_act_tab" href="#actions">Actions</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" class="adm_anom_an_tab" href="#anomalies">Anomalies</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="deblocage" class="tab-pane fade in active">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_deblocage" class="table table-striped table-hover">
                                        <thead>
                                        <th>MONTANT DU DEBLOCAGE</th>
                                        <th>DATE DU DEBLOCAGE</th>
                                        <th>ECHEANCE DE DEPART</th>
                                        <th>DUREE</th>
                                        <th>MONTANT NET DU DEBLOCAGE</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="echeance" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_echeance" class="table table-striped table-hover">
                                        <thead>
                                            <th>DATE DES ECHEANCES</th>
                                            <th>CAPITAL RESTANT DU AVANT ECHEANCE</th>
                                            <th>MONTANT AMORTISSEMENT</th>
                                            <th>MONTANT DES INTERETS</th>
                                            <th>MONTANT TOTAL DE L'ECHEANCE</th>
                                            <th>NUMERO DE L'ECHEANCE</th>
                                            <th>DATE DE REGLEMENT</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="garantie" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_garantie" class="table table-striped table-hover">
                                        <thead>
                                        <th>LIBELLE DE LA GARANTIE</th>
                                        <th>MONTANT DE LA GARANTIE</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="impayes" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_impaye" class="table table-striped table-hover">
                                        <thead>
                                        <th>DATE DE MISE EN IMPAYE</th>
                                        <th>DATE DE L'ECHEANCE IMPAYEE</th>
                                        <th>NUMERO DE L'ECHEANCE IMPAYEE</th>
                                        <th>PHASE IMPAYE EN COURS</th>
                                        <th>STATUT DE L'ECHEANCE</th>
                                        <th>MONTANT GLOBAL RESTANT EN IMPAYE(Déduction des rembourssements)</th>
                                        <th>MONTANT DES INTERETS JOURNALIERS DE RETARD</th>
                                        <th>MONTANT TOTAL DES INTERETS DE RETARD PAYES</th>
                                        <th>DATE DERNIER REMBOURSSEMENT</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="actions" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_actions" class="table table-striped table-hover">
                                        <thead>
                                        <th>TYPE D'ACTION</th>
                                        <th>DATE</th>
                                        <th>COMMENTAIRE</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="anomalies" class="tab-pane fade">
                                <div class="table-responsive">
                                    <table id="adm_anom_det_tbl_anomalies" class="table table-striped table-hover">
                                        <thead>
                                        <th>ID</th>
                                        <th>TYPE D'ANOMALIE</th>
                                        <th>DATE</th>
                                        <th>STATUT</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" style="font-weight: bold;color: white;" class="btn btn-danger"
                        data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>
