<div class="modal fade" id="dos_call_mdl" role="dialog">
    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Appel Effectué</h2>
            </div>
            <form action="">
                <div class="modal-body" style="background-color: #bce8f1;">
                    <p>
                        <span><b>Code crédit:</b>&nbsp;</span><span class="mdl_dos_call_cod_dos"></span><br>
                        <span><b>Non du client:</b>&nbsp;</span><span class="mdl_dos_call_nom_clt"></span><br>
                        <span><b>Adresse du client:</b>&nbsp;</span><span class="mdl_dos_call_adr_clt"></span><br>
                        <span><b>Telephone:</b>&nbsp;</span><span class="mdl_dos_call_tel_clt"></span><br>
                        <span><b>Genre:</b>&nbsp;</span><span class="mdl_dos_call_genre_clt"></span><br>
                    </p>
                    <p>
                    <div class="form-group">
                        <label class="checkbox-inline" >
                            <input name="specialite" id="specialite" type="checkbox"><b>Dossier domicilié</b>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Commentaire:</label>
                        <textarea class="form-control dos_call_commentaire" name="dos_call_commentaire" id="dos_call_commentaire"
                                  cols="5" rows="5"></textarea>
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
