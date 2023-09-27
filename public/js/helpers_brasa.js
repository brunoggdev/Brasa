/// <reference path="jquery.min.js" />
'use strict'; 
/**linhas de configuração acima, evite apagar. @author Brunoggdev*/


/**
 * Permite que o metodo formatarBRL() seja chamado em qualquer string para formata-la
 * @author Brunoggdev
 */
String.prototype.formatarBRL = function() {
    const formatado = this.replace(/,/g, '').replace(',', '.');
    const value = parseFloat(formatado);

    if (isNaN(value)) {
        throw new Error('String não parece ser um número válido.');
    }

    return value.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    });
};


/**
 * Converte data do formato yyyy-mm-dd para dd/mm/yyyy, ideal para o usuário.
 * @param {string} data
 * @returns {string} String com a data em formato dd/mm/yyyy
 * @author Bruno
 */
function paraDiaMesAno(data) {
    return data.split("-").reverse().join('/');
}


/**
 * Converte data do formato dd/mm/yyyy para yyyy-mm-dd, ideal para queries de banco de dados.
 * @param {string} data
 * @returns {string} String com a data em formato yyyy-mm-dd
 * @author Bruno
 */
function paraAnoMesDia(data) {
    return data.split("/").reverse().join('-');
}


/**
 * Atalho para atribuir um evento onclick evitando bug de duplo-evento
 * @param {string} jQuerySelector seletor de elemento tal qual jquery
 * @param {function(object):void} callback Funcao a ser executada no click
 * @author Brunoggdev
*/
function onClick(jQuerySelector, callback) {
    $(jQuerySelector).off('click').on('click', callback)
}


/**
 * Atalho para delegar um evento de um seletor para outro (útil para elementos gerados dinamicamente como tabelas)
 * @param {string} parentSelector seletor jquery do elemento que terá o evento delegado
 * @param {string} childSelector seletor jquery do elemnto receberá o evento
 * @param {function(object):void} callback Funcao a ser executada no click
 * @author Brunoggdev
*/
function delegarOnClick(jQuerySelector, childSelector, callback) {
    $(jQuerySelector).off('click', childSelector).on('click', childSelector, callback)
}



/**
 * Atalho para abrir uma modal rapidamente se já não estiver aberta e retornar sua instancia
 * @param {string} id_modal id da modal
 * @returns {object} Instancia da modal que foi aberta
 * @author Brunoggdev
*/
function modal(id_modal) {
    if (!id_modal.startsWith("#")) {
        id_modal = "#" + id_modal;
    }

    const modal = new bootstrap.Modal(id_modal)
    
    if(! $(id_modal).hasClass('show')){
        modal.show()
    }
    
    return modal
}


/**
 * Atalho para uma requisicao get com Jquery
 * @param endpoint url da requisicao
 * @param callback funcao a ser executada com o retorno
 * @author Brunoggdev
*/
function requisicaoGet(endpoint, callback){
    const fullEndpoint = endpoint.startsWith('https://')
    ? endpoint
    : BASE_URL + endpoint;

    $.get(fullEndpoint, callback)
}


/**
 * Atalho para uma requisicao post com Jquery
 * @param endpoint url da requisicao
 * @param dados corpo da requisicao
 * @param callback funcao a ser executada com o retorno
 * @author Brunoggdev
*/
function requisicaoPost(endpoint, dados, callback){
    const fullEndpoint = endpoint.startsWith('https://')
    ? endpoint
    : BASE_URL + endpoint;

    $.post(fullEndpoint, dados, callback)
}


/**
 * Devolve um objeto com os elementos da linha clicada mapeados para a respectiva coluna
 * @param {string} elemento o elemento jquery clicado ($(this))
 * @author Brunoggdev
*/
function linhaParaObjeto(clickedElement) {
    const rowData = {};
    const columnNames = [];
    const specialChars = {
        'ç': 'c',
        'á': 'a',
        'ã': 'a',
        'é': 'e',
        'ê': 'e',
        'í': 'i',
        'ó': 'o',
        'ô': 'o',
        'ú': 'u',
      };
      
    // pegando e tratando nomes das colunas
    $(clickedElement).closest('table').find('thead th').each(function() {
        const columnName = $(this).text().toLowerCase().replace(/[^\w\s]/gi, match => specialChars[match] || match).replace('.', '').replace(' ', '_');
        columnNames.push(columnName);
    });

    // mapeando colunas e linhas no objeto
    $(clickedElement).parent().siblings('td:not(:last-child):not(:last-child)').each(function(index) {
      const columnName = columnNames[index];
      const columnValue = $(this).text();
      rowData[columnName] = columnValue;
    });
    
    return rowData;
}