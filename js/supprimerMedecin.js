$('#tableMedecin').Tabledit({
    url: 'supprimerMedecin.php',
    rowIdentifier: 'data-id',
    editButton: false,
    restoreButton: false,
    buttons: {
        delete: {
            //  html: '<span class="glyphicon glyphicon-trash"></span> &nbsp Supprimer',
            action: 'delete'
        },
        confirm: {
            //    class: 'btn btn-sm btn-danger',
            html: 'Êtes-vous sûr?'
        }
    },

    columns: {
    identifier: [0, 'idMEDECIN'],
        editable: [[1, 'nom'], [2, 'prenom'], [3, 'adresse'], [4, 'grade'], [5, 'specialite'], [6, 'telephone']]
}

});