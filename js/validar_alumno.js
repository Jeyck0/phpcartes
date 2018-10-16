function validar(){
    var matricula, rut, nombres, apellidos, nacimiento, ciudad, direccion, telefono, sexo, curso, expresion;
    matricula = document.getElementById("matricula").value;
    rut = document.getElementById("rut").value;
    nombres = document.getElementById("nombres").value;
    apellidos = document.getElementById("apellidos").value;
    nacimiento = document.getElementById("nacimiento").value;
    ciudad = document.getElementById("ciudad").value;
    direccion = document.getElementById("direccion").value;
    telefono = document.getElementById("telefono").value;
    sexo = document.getElementById("sexo").value;
    curso = document.getElementById("curso").value;

    if (matricula === "" || rut === "" || nombres === "" || apellidos === "" || nacimiento === "" || ciudad === "" || direccion === "" || telefono === "" || sexo === "" || curso === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(rut.length>10){
        alert("El rut es muy largo");
        return false;
    }
    else if(nombres.length>50){
        alert("El nombre es muy largo");
        return false;
    }
    else if(apellidos.length>50){
        alert("El apellidos es muy largo");
        return false;
    }
    else if(ciudad.length>50){
        alert("La ciudad es muy largo");
        return false;
    }
    else if(direccion.length>50){
        alert("La direccion es muy largo");
        return false;
    }
    else if(telefono.length>9){
        alert("El telefono es muy largo");
        return false;
    }
    else if(curso.length>2){
        alert("El curso es muy largo");
        return false;
    }
}