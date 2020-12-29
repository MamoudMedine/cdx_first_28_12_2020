<div class="modal fade" id="anom_anomalie_mdl" role="dialog">
    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Anomalie</h2>
            </div>
            <form action="">
                <div class="modal-body" style="background-color: #bce8f1;">
                    <p>
                        <span><b>ID:</b>&nbsp;</span><span class="mdl_anom_sms_cod_dos"></span><br>
{{--                        <span><b>Non du client:</b>&nbsp;</span><span class="mdl_anom_sms_nom_clt"></span><br>--}}
{{--                        <span><b>Adresse du client:</b>&nbsp;</span><span class="mdl_anom_sms_adr_clt"></span><br>--}}
{{--                        <span><b>Telephone:</b>&nbsp;</span><span class="mdl_anom_sms_tel_clt"></span><br>--}}
{{--                        <span><b>Genre:</b>&nbsp;</span><span class="mdl_anom_sms_genre_clt"></span><br>--}}
                    </p>
                    <p>
                    <div class="form-group">
                        <label for="type_anomalie">Type d'anomalie:</label>
                        <select class="form-control" name="type_anomalie" id="type_anomalie">
                            <option value="TA_NI">Numéro injoignable</option>
                            <option value="TA_NM">Numéro manquant</option>
                            <option value="TA_DE">Débiteur erroné</option>
                            <option value="TA_DS">Dossier soldé</option>
                            <option value="TA_PD">Prêt non demandé</option>
                            <option value="TA_PA">Prêt non accordé</option>
                            <option value="TA_DP">Déni du Prêt</option>
                            <option value="TA_AR">Aucune relation avec COOPEC</option>
                            <option value="TA_A">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="anom_anomalie_commentaire">Commentaire:</label>
                        <textarea class="form-control anom_anomalie_commentaire" name="anom_anomalie_commentaire"
                                  id="anom_anomalie_commentaire"
                                  cols="5" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Statut anomalie</label>
                        <div class="type_row">
                            <label class="checkbox-inline">
                                <input type="radio" value="STATUS_ACTIVE" name="statut_anom" checked=""> active
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" value="STATUS_CLOSE" name="statut_anom"> close
                            </label>
                            <label class="checkbox-inline">
                                <input type="radio" value="STATUS_ACTIVE_N" name="statut_anom"> Contentieux
                            </label>
                        </div>
                    </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="font-weight: bold;color: white;" class="btn btn-danger"
                            data-dismiss="modal">Fermer</button>
                    <button type="submit" style="font-weight: bold;color: white;" class="btn btn-primary">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
