$(document).ready(function() {
    $('#agregar').click(function() {
       // $("#select_profesional").attr("name",'select_profesional_1');
        var num     = $('.clonar').length; // how many "duplicatable" div fields we currently have
        var newNum  = new Number(num + 1);      // the numeric ID of the new div field being added

        // create the new element via clone(), and manipulate it's ID using newNum value
        var newElem = $('#div' + num).clone().attr('id', 'div' + newNum);

        // manipulate the name/id values of the div inside the new element
        newElem.children(':first').attr('id', 'docente' + newNum).attr('name', 'docente' + newNum);
     

        // insert the new element after the last "duplicatable" div field
        $('#div' + num).after(newElem);

        // enable the "remove" button
        $('#btnDel').attr('disabled','');

        // business rule: you can only add 5 names
        if (newNum == 5)
            $('#agregar').attr('disabled','disabled');
    });

    $('#btnDel').click(function() {
        var num = $('.clonar').length; // how many "duplicatable" div fields we currently have
        $('#div' + num).remove();     // remove the last element

        // enable the "add" button
        $('#agregar').attr('disabled','');

        // if only one element remains, disable the "remove" button
        if (num-1 == 1)
            $('#btnDel').attr('disabled','disabled');
    });

    $('#btnDel').attr('disabled','disabled');
    
});