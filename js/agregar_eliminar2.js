$(document).ready(function() {
    $('#boton').click(function() {
       // $("#select_profesional").attr("name",'select_profesional_1');
        var num     = $('.clon').length; // how many "duplicatable" divs fields we currently have
        var newNum  = new Number(num + 1);      // the numeric ID of the new divs field being added

        // create the new element via clone(), and manipulate it's ID using newNum value
        var newElem = $('#divs' + num).clone().attr('id', 'divs' + newNum);

        // manipulate the name/id values of the divs inside the new element
        newElem.children(':first').attr('id', 'profe' + newNum).attr('name', 'profe' + newNum);
     

        // insert the new element after the last "duplicatable" divs field
        $('#divs' + num).after(newElem);

        // enable the "remove" button
        $('#btnDel').attr('disabled','');

        // business rule: you can only add 5 names
        if (newNum == 5)
            $('#boton').attr('disabled','disabled');
    });

    $('#btnDel').click(function() {
        var num = $('.clon').length; // how many "duplicatable" divs fields we currently have
        $('#divs' + num).remove();     // remove the last element

        // enable the "add" button
        $('#boton').attr('disabled','');

        // if only one element remains, disable the "remove" button
        if (num-1 == 1)
            $('#btnDel').attr('disabled','disabled');
    });

    $('#btnDel').attr('disabled','disabled');
});