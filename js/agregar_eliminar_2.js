$(document).ready(function() {
    $('#btnAdd2').click(function() {
       // $("#select_profesional").attr("name",'select_profesional_1');
        var num     = $('.clonedInput2').length; // how many "duplicatable" input fields we currently have
        var newNum  = new Number(num + 1);      // the numeric ID of the new input field being added

        // create the new element via clone(), and manipulate it's ID using newNum value
        var newElem = $('#input2' + num).clone().attr('id', 'input2' + newNum);

        // manipulate the name/id values of the input inside the new element
        newElem.children(':first').attr('id', 'nombre2' + newNum).attr('name', 'nombre2' + newNum);
     

        // insert the new element after the last "duplicatable" input field
        $('#input2' + num).after(newElem);

        // enable the "remove" button
        $('#btnDel').attr('disabled','');

        // business rule: you can only add 5 names
        if (newNum == 5)
            $('#btnAdd2').attr('disabled','disabled');
    });

});