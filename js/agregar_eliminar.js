$(document).ready(function() {
    $('#btnAdd2').click(function() {
       // $("#select_profesional").attr("name",'select_profesional_1');
        var num     = $('.clonedInput2').length; // how many "duplicatable" input fields we currently have
        var newNum  = new Number(num + 2);      // the numeric ID of the new input field being added

        // create the new element via clone(), and manipulate it's ID using newNum value
        var newElem = $('#input2' + num).clone().attr('id', 'input2' + newNum);

        // manipulate the name/id values of the input inside the new element
        newElem.children(':first').attr('id', 'nombre' + newNum).attr('name', 'nombre' + newNum);
     

        // insert the new element after the last "duplicatable" input field
        $('#input2' + num).after(newElem);

        // enable the "remove" button
        $('#btnDel').attr('disabled','');

        // business rule: you can only add 5 names
        if (newNum == 5)
            $('#btnAdd2').attr('disabled','disabled');
    });

    $('#btnDel').click(function() {
        var num = $('.clonedInput2').length; // how many "duplicatable" input fields we currently have
        $('#input2' + num).remove();     // remove the last element

        // enable the "add" button
        $('#btnAdd2').attr('disabled','');

        // if only one element remains, disable the "remove" button
        if (num-1 == 1)
            $('#btnDel').attr('disabled','disabled');
    });

    $('#btnDel').attr('disabled','disabled');
});