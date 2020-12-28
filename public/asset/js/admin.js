$(function() {

    $("#table_adm_dossier").DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
        },
        responsive:true,
        ordering:false
    });
    $(document).on('click', '.user_agence_pointer', function() {
        location.reload(true);
    });

    function supprimerUtilisateur() {
        $(document).on('click', '#delete_user', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');

            swal.fire({
                title: "Voulez-vous supprimer cet utilisateur ?",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Supprimer',
                cancelButtonText: 'Annuler',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(response) {
                            if(response.success) {
                                Swal.fire({
                                    title: 'Utilisateur supprimer avec succès !',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 2000
                                }).then(() => {
                                    location.reload(true);
                                });
                            }
                            else {
                                Swal.fire({
                                    title: 'Suppression echouée !',
                                    icon: 'error'
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Oups ! Une erreur est survenue',
                                icon: 'error'
                            });
                        }
                    })
                }
            });
        })
    }

    $(document).on('click', '#btn_save_agence', function() {
        var agence_id = $(this).attr('data-id');
        var email = $(this).closest('tr').find('td:eq(3)').find('form').find('#agence_email').val();
        var token = $('input[name="_token"]').val();
        var url = $('#form_agence_save_email').attr('action');

        $.ajax({
            url: url,
            type: 'POST',
            data: {agence_id: agence_id, email: email, _token: token},
            success: function(response) {
                if(response.success) {
                    Swal.fire({
                        title: 'Email enregistré !',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        location.reload(true);
                    });
                }
                else {
                    Swal.fire({
                        title: 'Sauvegarde echouée !',
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Oups ! Une erreur est survenue',
                    icon: 'error'
                });
            }
        })
    });


    //  Appel des fonctions
    supprimerUtilisateur()

});
