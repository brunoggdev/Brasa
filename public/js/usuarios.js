/// <reference path="jquery.min.js" />
/// <reference path="helpers_brasa.js" />
'use strict';
/**linhas de configuração acima, evite apagar. @author Brunoggdev*/

onClick('#abrir-modal-novo-usuario', function () {
    modal('modal-novo-usuario')
})

onClick('.editar-usuario', function(){

    const usuario = linhaParaObjeto(this);

    $('#editar-id').val(usuario.id)
    $('#editar-nome').val(usuario.nome)
    $('#editar-usuario').val(usuario.usuario)
    $('#editar-email').val(usuario.email)
    $('#editar-is_admin').val(usuario.admin === "Não" ? 0 : 1)


    modal('modal-editar-usuario')
})