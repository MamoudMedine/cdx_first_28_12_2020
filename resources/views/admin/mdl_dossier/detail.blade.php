<div class="modal fade" id="dos_detail_mdl" role="dialog">
    <div class="modal-dialog"  style="min-width: 1000px!important;">
        <!-- Modal content-->
        <div class="modal-content">
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <h4 class="modal-title">Modal Header</h4>--}}
{{--            </div>--}}
            <div class="modal-body">
                <h3 style="color: red;">Client</h3>
                <div class="row mg-b-10">
                    <div class="col-md-4">
                        <span><b>Code client:</b>&nbsp;</span><span class="mdl_dos_det_cod_clt"></span><br>
                        <span><b>Non du client:</b>&nbsp;</span><span class="mdl_dos_det_nom_clt"></span><br>
                        <span><b>Adresse du client:</b>&nbsp;</span><span class="mdl_dos_det_adr_clt"></span><br>
                        <span><b>Numéro d'identité:</b>&nbsp;</span><span class="mdl_dos_det_cni_clt"></span><br>
                    </div>
                    <div class="col-md-4">
                        <span><b>Telephone:</b>&nbsp;</span><span class="mdl_dos_det_tel_clt"></span><br>
                        <span><b>Situation matrimoniale:</b>&nbsp;</span><span class="mdl_dos_det_sit_clt"></span><br>
                        <span><b>Date de naissance:</b>&nbsp;</span><span class="mdl_dos_det_naiss_clt"></span><br>
                        <span><b>Sexe ou genre:</b>&nbsp;</span><span class="mdl_dos_det_sex_clt"></span><br>
                    </div>
                    <div class="col-md-4">
                        <span><b>Code agence:</b>&nbsp;</span><span class="mdl_dos_det_cag_clt"></span><br>
                        <span><b>Pays de residence du client:</b>&nbsp;</span><span class="mdl_dos_det_pres_clt"></span><br>
                        <span><b>Pays de nationalité du client:</b>&nbsp;</span><span class="mdl_dos_det_pnat_clt"></span><br>
                        <span><b>Nom de la mere:</b>&nbsp;</span><span class="mdl_dos_det_mere_clt"></span><br>
                    </div>
                </div>
                <h3 style="color: red;">Credit</h3>
                <div class="row">
                    <div class="col-md-6">
                        <span><b>Numero de compte du client:</b>&nbsp;</span><span class="mdl_dos_det_numcpt_clt"></span><br>
                        <span><b>Capital initial:</b>&nbsp;</span><span class="mdl_dos_det_cap_init"></span><br>
                        <span><b>Encours du credit:</b>&nbsp;</span><span class="mdl_dos_det_enc_crd"></span><br>
                    </div>
                    <div class="col-md-6">
                        <span><b>Capital total amorti:</b>&nbsp;</span><span class="mdl_dos_det_cap_tot_am"></span><br>
                        <span><b>Capital restant à amorti:</b>&nbsp;</span><span class="mdl_dos_det_cap_res_am"></span><br>
                        <span><b>Durée du prêt:</b>&nbsp;</span><span class="mdl_dos_det_du_prt"></span><br>
                    </div>
                </div>
                <div class="row align-center" style="margin-top:5px;">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" style="font-weight: bold;" href="#deblocage">Deblocage</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" href="#echeance">Echeance</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" href="#garantie">Garantie</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" href="#impayes">Impayes</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" href="#actions">Actions</a></li>
                            <li><a data-toggle="tab" style="font-weight: bold;" href="#anomalies">Anomalies</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="deblocage" class="tab-pane fade in active">
                                <div class="table-responsive">
                                    <table id="adm_dos_det_tbl_deblocage" class="table table-striped table-hover">
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
                                <h3>Menu 2</h3>
                                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <div id="garantie" class="tab-pane fade">
                                <h3>Menu 3</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            <div id="impayes" class="tab-pane fade">
                                <h3>Menu 4</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                            <div id="actions" class="tab-pane fade">
                                <h3>Menu 5</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                            <div id="anomalies" class="tab-pane fade">
                                <h3>Menu 6</h3>
                                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </div>
        </div>

    </div>
</div>
