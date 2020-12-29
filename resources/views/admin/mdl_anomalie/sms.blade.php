<div class="modal fade" id="anom_sms_mdl" role="dialog">
    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content">
            @csrf
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Envoyer un SMS au client</h2>
            </div>
            <form action="">
                <div class="modal-body" style="background-color: #bce8f1;">
                    <p>
                        <span><b>Code crédit:</b>&nbsp;</span><span class="mdl_anom_sms_cod_dos"></span><br>
                        <span><b>Non du client:</b>&nbsp;</span><span class="mdl_anom_sms_nom_clt"></span><br>
                        <span><b>Adresse du client:</b>&nbsp;</span><span class="mdl_anom_sms_adr_clt"></span><br>
                        <span><b>Telephone:</b>&nbsp;</span><span class="mdl_anom_sms_tel_clt"></span><br>
                        <span><b>Genre:</b>&nbsp;</span><span class="mdl_anom_sms_genre_clt"></span><br>
                    </p>
                    <p>
                       <div class="form-group">
                        <label for="">TEL:</label>
                            <input name="telephone_clt" class="form-control mdl_anom_sms_input_tel_clt" type="text">
                       </div>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" style="font-weight: bold;color: white;" class="btn btn-danger"
                            data-dismiss="modal">Fermer</button>
                    <button type="submit" style="font-weight: bold;color: white;" class="btn btn-primary">
                        Envoyer
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
