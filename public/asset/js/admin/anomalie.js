$(function (){
     //alert('dossieer admin');
     //get_anomalies();
     // DOSSIERV PAR AGENCE
     $(document).on('change', '#anom_nom_agence', function (){
         //console.log($(this).val());
         window.location.href = '/admin/anomalie/'+$(this).val();
     });
    // RECUPERATION DETAIL CLIENT CREDIT ET DEBLOCAGE
     $(document).on('click', '.anom_detail_mdl', function (){
           $('.adm_anom_det_cod_dos').val($(this).attr('cod_dos'));
           $('.mdl_anom_det_cod_clt').text($(this).closest('tr').find('input:eq(0)').val());
           $('.mdl_anom_det_nom_clt').text($(this).closest('tr').find('input:eq(1)').val());
           $('.mdl_anom_det_adr_clt').text($(this).closest('tr').find('input:eq(2)').val());
           $('.mdl_anom_det_cni_clt').text($(this).closest('tr').find('input:eq(3)').val());
           $('.mdl_anom_det_tel_clt').text($(this).closest('tr').find('input:eq(4)').val());
           $('.mdl_anom_det_sit_clt').text($(this).closest('tr').find('input:eq(5)').val());
           $('.mdl_anom_det_naiss_clt').text($(this).closest('tr').find('input:eq(6)').val());
           $('.mdl_anom_det_sex_clt').text($(this).closest('tr').find('input:eq(7)').val());
           $('.mdl_anom_det_cag_clt').text($(this).closest('tr').find('input:eq(8)').val());
           $('.mdl_anom_det_pres_clt').text($(this).closest('tr').find('input:eq(9)').val());
           $('.mdl_anom_det_pnat_clt').text($(this).closest('tr').find('input:eq(10)').val());
           $('.mdl_anom_det_mere_clt').text($(this).closest('tr').find('input:eq(11)').val());

           $('.mdl_anom_det_numcpt_clt').text($(this).closest('tr').find('input:eq(12)').val());
           $('.mdl_anom_det_cap_init').text($(this).closest('tr').find('input:eq(13)').val());
           $('.mdl_anom_det_enc_crd').text($(this).closest('tr').find('input:eq(14)').val());
           $('.mdl_anom_det_cap_tot_am').text($(this).closest('tr').find('input:eq(15)').val());
           $('.mdl_anom_det_cap_res_am').text($(this).closest('tr').find('input:eq(16)').val());
           $('.mdl_anom_det_du_prt').text($(this).closest('tr').find('input:eq(17)').val());
           get_deblocages(this);
     });
     // MODAL SENS SMS
     $(document).on('click', '.anom_sms_mdl', function (){
           $('.mdl_anom_sms_cod_dos').text($(this).closest('tr').find('td:eq(0)').find('button').attr('cod_dos'));
           $('.mdl_anom_sms_nom_clt').text($(this).closest('tr').find('input:eq(1)').val());
           $('.mdl_anom_sms_adr_clt').text($(this).closest('tr').find('input:eq(2)').val());
           $('.mdl_anom_sms_tel_clt').text($(this).closest('tr').find('input:eq(4)').val());
           $('.mdl_anom_sms_genre_clt').text($(this).closest('tr').find('input:eq(7)').val());
          $('.mdl_anom_sms_input_tel_clt').val($(this).closest('tr').find('input:eq(4)').val());
     });
    // MODAL CALL
    $(document).on('click', '.anom_call_mdl', function (){
        $('.mdl_anom_call_cod_dos').text($(this).closest('tr').find('td:eq(0)').find('button').attr('cod_dos'));
        $('.mdl_anom_call_nom_clt').text($(this).closest('tr').find('input:eq(1)').val());
        $('.mdl_anom_call_adr_clt').text($(this).closest('tr').find('input:eq(2)').val());
        $('.mdl_anom_call_tel_clt').text($(this).closest('tr').find('input:eq(4)').val());
        $('.mdl_anom_call_genre_clt').text($(this).closest('tr').find('input:eq(7)').val());
    });
    // MODAL VISITE
    $(document).on('click', '.anom_visit_mdl', function (){
        $('.mdl_anom_call_cod_dos').text($(this).closest('tr').find('td:eq(0)').find('button').attr('cod_dos'));
        $('.mdl_anom_call_nom_clt').text($(this).closest('tr').find('input:eq(1)').val());
        $('.mdl_anom_call_adr_clt').text($(this).closest('tr').find('input:eq(2)').val());
        $('.mdl_anom_call_tel_clt').text($(this).closest('tr').find('input:eq(4)').val());
        $('.mdl_anom_call_genre_clt').text($(this).closest('tr').find('input:eq(7)').val());
    });
    // RECUPERATION DETAIL ECHEANCE
     $(document).on('click', '.adm_anom_ech_tab', function (){
         var url_get_echeance = $(".get_echeance_url").val();
         var code_dos = $('.adm_anom_det_cod_dos').val();
         var token = $('input[name=_token]').val();
         $.ajax({
             url: url_get_echeance,
             method: 'POST',
             data: {_token: token, code_dos: code_dos},
             success: function (resp){
                 //console.log(resp.dossiers);
                 $("#adm_anom_det_tbl_echeance").find('tbody').find('tr').remove();
                 //console.log(resp.echeances);
                 $.each(resp.echeances, function (i, ech){
                     var tr = '<tr>';
                     tr += '<td>'+ ech.date_echeance +'</td>';
                     tr += '<td>'+ ech.capital_restant_du +'</td>';
                     tr += '<td>'+ ech.montant_amortissement +'</td>';
                     tr += '<td>'+ ech.montant_interet +'</td>';
                     tr += '<td>'+ ech.montant_total_echeance +'</td>';
                     tr += '<td>'+ ech.numero_echeance +'</td>';
                     tr += '<td>'+ ech.date_reglement +'</td>';
                     tr += '</tr>';
                     $("#adm_anom_det_tbl_echeance").find('tbody').append(tr);
                 });
             },
             error: function (){
                 console.log('erreur survenue');
             }
         });
     });
     // GARANTIES
     $(document).on('click', '.adm_anom_gar_tab', function (){
        var url_get_garantie = $(".get_garantie_url").val();
        var code_dos = $('.adm_anom_det_cod_dos').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url_get_garantie,
            method: 'POST',
            data: {_token: token, code_dos: code_dos},
            success: function (resp){
                //console.log(resp.dossiers);
                $("#adm_anom_det_tbl_garantie").find('tbody').find('tr').remove();
                //console.log(resp.echeances);
                $.each(resp.garanties, function (i, gar){
                    var tr = '<tr>';
                    tr += '<td>'+ gar.libelle +'</td>';
                    tr += '<td>'+ gar.montant +'</td>';
                    tr += '</tr>';
                    $("#adm_anom_det_tbl_garantie").find('tbody').append(tr);
                });
            },
            error: function (){
                console.log('erreur survenue');
            }
        });
    });
    // IMPAYES
    $(document).on('click', '.adm_anom_imp_tab', function (){
        var url_get_impaye = $(".get_impaye_url").val();
        var code_dos = $('.adm_anom_det_cod_dos').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url_get_impaye,
            method: 'POST',
            data: {_token: token, code_dos: code_dos},
            success: function (resp){
                //console.log(resp.dossiers);
                $("#adm_anom_det_tbl_impaye").find('tbody').find('tr').remove();
                //console.log(resp.echeances);
                $.each(resp.impayes, function (i, imp){
                    var tr = '<tr>';
                    tr += '<td>'+ imp.date_mise_impayee +'</td>';
                    tr += '<td>'+ imp.date_echeance_impayee +'</td>';
                    tr += '<td>'+ imp.numero_echeance_impayee +'</td>';
                    tr += '<td>'+ imp.phase +'</td>';
                    tr += '<td>'+ imp.statut_echeance +'</td>';
                    tr += '<td>'+ imp.montant_global_restant +'</td>';
                    tr += '<td>'+ imp.montant_interet_journalier_retard +'</td>';
                    tr += '<td>'+ imp.montant_total_interet_retard +'</td>';
                    tr += '<td>'+ imp.date_dernier_remboursement +'</td>';
                    tr += '</tr>';
                    $("#adm_anom_det_tbl_impaye").find('tbody').append(tr);
                });
            },
            error: function (){
                console.log('erreur survenue');
            }
        });
    });
    // ACTIONS
    $(document).on('click', '.adm_anom_act_tab', function (){
        var url_get_action = $(".get_action_url").val();
        var code_dos = $('.adm_anom_det_cod_dos').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url_get_action,
            method: 'POST',
            data: {_token: token, code_dos: code_dos},
            success: function (resp){
                //console.log(resp.dossiers);
                $("#adm_anom_det_tbl_actions").find('tbody').find('tr').remove();
                //console.log(resp.echeances);
                $.each(resp.actions, function (i, act){
                    var tr = '<tr>';
                    tr += '<td>'+ act.type +'</td>';
                    tr += '<td>'+ act.created_at.substr(0, 10) +'</td>';
                    tr += '<td>'+ act.commentaire +'</td>';
                    tr += '</tr>';
                    $("#adm_anom_det_tbl_actions").find('tbody').append(tr);
                });
            },
            error: function (){
                console.log('erreur survenue');
            }
        });
    });
    // ANOMALIES
    $(document).on('click', '.adm_anom_an_tab', function (){
        var url_get_anomalie = $(".get_anomalie_url").val();
        var code_dos = $('.adm_anom_det_cod_dos').val();
        var token = $('input[name=_token]').val();
        $.ajax({
            url: url_get_anomalie,
            method: 'POST',
            data: {_token: token, code_dos: code_dos},
            success: function (resp){
                //console.log(resp.dossiers);
                $("#adm_anom_det_tbl_anomalies").find('tbody').find('tr').remove();
                //console.log(resp.echeances);
                $.each(resp.anomalies, function (i, anom){
                    var tr = '<tr>';
                    tr += '<td>'+ anom.id +'</td>';
                    tr += '<td>'+ anom.type +'</td>';
                    tr += '<td>'+ anom.created_at.substr(0, 10) +'</td>';
                    tr += '<td>'+ anom.statut +'</td>';
                    tr += '</tr>';
                    $("#adm_anom_det_tbl_anomalies").find('tbody').append(tr);
                });
            },
            error: function (){
                console.log('erreur survenue');
            }
        });
    });
     function get_anomalies(){
         var url_get_anomalies = $("#get_anomalies_url").val();
         setTimeout(function (){
             $.ajax({
                 url: url_get_anomalies,
                 method: 'GET',
                 success: function (resp){
                     //console.log(resp.dossiers);
                     $("#table_adm_dossier").find('tbody').find('tr').remove();
                     $.each(resp.dossiers, function (i, dos){
                         //console.log(dos.nom_client);
                         var tr = generate_table(dos.code_dossier, dos.code_dossier,
                             dos.code_dossier, dos.capital, dos.nom_client, dos.adresse, dos.contact, dos.sexe);
                         $("#table_adm_dossier").find('tbody').append(tr);

                     });
                 },
                 error: function (){
                     console.log('erreur survenue');
                 }
             });
         }, 1000);
     }// RECUPERATION DES DOSSIERS
     function get_deblocages(btn){ // GET DEBLOCAGE PAR DOSSIER
        var url_get_deblocages = $("#get_deblocages_url").val();
        var code_dos = $(btn).closest('tr').find('input:eq(18)').attr('cod_dos');
        var token = $('input[name=_token]').val();

            $.ajax({
                url: url_get_deblocages,
                method: 'POST',
                data: {_token: token, code_dos: code_dos},
                success: function (resp){
                    //console.log(resp.dossiers);
                    $("#adm_anom_det_tbl_deblocage").find('tbody').find('tr').remove();
                    console.log(resp.deblocage);
                    $.each(resp.deblocage, function (i, deb){
                        var tr = '<tr>';
                            tr += '<td>'+ deb.montant_deblocage +'</td>';
                            tr += '<td>'+ deb.date_deblocage +'</td>';
                            tr += '<td>'+ deb.echeance_depart +'</td>';
                            tr += '<td>'+ deb.duree_echeance +'</td>';
                            tr += '<td>'+ deb.montant_net_echeance +'</td>';
                            tr += '</tr>';
                        $("#adm_anom_det_tbl_deblocage").find('tbody').append(tr);
                    });
                },
                error: function (){
                    console.log('erreur survenue');
                }
            });

    } // RECUPERATION DES DEBLOCAGES
    function  generate_table(cod, qte_ech, imp, cap_init, nom_clt, adr, tel, genre){
        var tr = '<tr>';
            tr += '<td><button class="btn btn-default"><i class="fa fa-plus"></i></button></td>';
            tr += '<td>'+cod+'</td>';
            tr += '<td>'+qte_ech+'</td>';
            tr += '<td>'+imp+'</td>';
            tr += '<td>'+cap_init+'</td>';
            tr += '<td>'+nom_clt+'</td>';
            tr += '<td>'+adr+'</td>';
            tr += '<td>'+tel+'</td>';
            tr += '<td>'+genre+'</td>';
            tr += '<td><div class="row" style="margin-bottom: 1px;padding-right: 2px;"><button class="btn btn-danger" ><i class="fa fa-comment-o"></i></button>&nbsp;';
            tr += '<button class="btn btn-danger" ><i class="fa fa-phone"></i></button></div>';
            tr += '<div class="row" style="padding-right: 2px;"><button class="btn btn-danger" ><i class="fa fa-home"></i></button>&nbsp;';
            tr += '<button class="btn btn-danger" ><i class="fa fa-info"></i></button></div>';
            tr += '</td>';
            tr += '</tr>';
       return tr;
     }// GENNERE TABLE DOSSIERS
    // ANOMALIE FILTRE
    $(document).on('click', '.btn_filtre_par_type', function (){

    });
});
