$(function (){
     //alert('dossieer admin');
     //get_dossiers();
     $(document).on('click', '.dos_detail_mdl', function (){
           $('.mdl_dos_det_cod_clt').text($(this).closest('tr').find('input:eq(0)').val());
           $('.mdl_dos_det_nom_clt').text($(this).closest('tr').find('input:eq(1)').val());
           $('.mdl_dos_det_adr_clt').text($(this).closest('tr').find('input:eq(2)').val());
           $('.mdl_dos_det_cni_clt').text($(this).closest('tr').find('input:eq(3)').val());
           $('.mdl_dos_det_tel_clt').text($(this).closest('tr').find('input:eq(4)').val());
           $('.mdl_dos_det_sit_clt').text($(this).closest('tr').find('input:eq(5)').val());
           $('.mdl_dos_det_naiss_clt').text($(this).closest('tr').find('input:eq(6)').val());
           $('.mdl_dos_det_sex_clt').text($(this).closest('tr').find('input:eq(7)').val());
           $('.mdl_dos_det_cag_clt').text($(this).closest('tr').find('input:eq(8)').val());
           $('.mdl_dos_det_pres_clt').text($(this).closest('tr').find('input:eq(9)').val());
           $('.mdl_dos_det_pnat_clt').text($(this).closest('tr').find('input:eq(10)').val());
           $('.mdl_dos_det_mere_clt').text($(this).closest('tr').find('input:eq(11)').val());

           $('.mdl_dos_det_numcpt_clt').text($(this).closest('tr').find('input:eq(12)').val());
           $('.mdl_dos_det_cap_init').text($(this).closest('tr').find('input:eq(13)').val());
           $('.mdl_dos_det_enc_crd').text($(this).closest('tr').find('input:eq(14)').val());
           $('.mdl_dos_det_cap_tot_am').text($(this).closest('tr').find('input:eq(15)').val());
           $('.mdl_dos_det_cap_res_am').text($(this).closest('tr').find('input:eq(16)').val());
           $('.mdl_dos_det_du_prt').text($(this).closest('tr').find('input:eq(17)').val());
           get_deblocages(this);
     });
     function get_dossiers(){
         var url_get_dossiers = $("#get_dossiers_url").val();
         setTimeout(function (){
             $.ajax({
                 url: url_get_dossiers,
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
     }
     function get_deblocages(btn){
        var url_get_deblocages = $("#get_deblocages_url").val();
        var code_dos = $(btn).closest('tr').find('input:eq(18)').attr('cod_dos');
        var token = $('input[name=_token]').val();

            $.ajax({
                url: url_get_deblocages,
                method: 'POST',
                data: {_token: token, code_dos: code_dos},
                success: function (resp){
                    //console.log(resp.dossiers);
                    $("#adm_dos_det_tbl_deblocage").find('tbody').find('tr').remove();
                    console.log(resp.deblocage);
                    $.each(resp.deblocage, function (i, deb){
                        var tr = '<tr>';
                            tr += '<td>'+ deb.montant_deblocage +'</td>';
                            tr += '<td>'+ deb.date_deblocage +'</td>';
                            tr += '<td>'+ deb.echeance_depart +'</td>';
                            tr += '<td>'+ deb.duree_echeance +'</td>';
                            tr += '<td>'+ deb.montant_net_echeance +'</td>';
                            tr += '</tr>';
                        $("#adm_dos_det_tbl_deblocage").find('tbody').append(tr);
                    });
                },
                error: function (){
                    console.log('erreur survenue');
                }
            });

    }
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
     }
});
