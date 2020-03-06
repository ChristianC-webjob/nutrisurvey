// VERIFICA INGRESO DE DATOS OBLIGATORIOS DE LAS PREGUNTAS DE LA ENCUESTA
function checkform_preguntas(){
    var respuestas = document.querySelectorAll("[id^=respuesta]");
    var salida=true;
    var opciones=false;
    for (var i=0; i<respuestas.length; i++){
      if(respuestas[i].type=='radio') {
        if(i==0) {
          if(!respuestas[0].checked) {
            return true;
          }
        }else {
          if(respuestas[i].checked) {
            opciones=true;
          }
        }
      }
    }
    for (var i=0; i<respuestas.length; i++){
      if(respuestas[i].type=='select-one') {
        if(i==0) {
          if(respuestas[0].value==-1) {
            return true;
          }
        } else {
          if(respuestas[i].value==-1) {
            // alert(respuestas[i].name);
            // alert(respuestas[i].value);
            salida=false;
          }
        }
      }
    }
    for (var i=0; i<respuestas.length; i++){
      if(respuestas[i].type=='text') {
        if(respuestas[i].value=== '' || respuestas[i].value=== null) {
          // alert(respuestas[i].name);
          // alert(respuestas[i].value);
          salida=false;
        }
      }
    }

    if (salida==false) {
      alert('Debe ingresar la totalidad de los datos solicitados');
    }
    return salida;
}

// VERIFICA INGRESO DE DATOS OBLIGATORIOS DEL REGISTRO DE LA ENCUESTA
function checkform_registro(){
  var respuestas = document.querySelectorAll("[id^=respuesta]");
  var salida=true;
  for (var i=0; i<respuestas.length; i++){
    if(respuestas[i].type=='text') {
      if(respuestas[i].value=== '' || respuestas[i].value=== null) {
        salida=false;
      }
    }
    if(respuestas[i].type=='number') {
      if(respuestas[i].value=== '' || respuestas[i].value=== null) {
        salida=false;
      }
    }
    if(respuestas[i].type=='select-one') {
      if(respuestas[i].value==-1) {
        salida=false;
      }
    }
  }
  if (salida==false) {
    alert('Por favor ingrese todos los datos.');
  }
  return salida;
}

// VALIDA NUMEROS CON DECIMALES
function checkFloat(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {return true;}
  // Patron de entrada, en este caso solo acepta numeros y punto
  patron = /[0-9.]+/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}

// VALIDA NUMEROS ENTEROS
function checkInt(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  //Tecla de retroceso para borrar, siempre la permite
  if (tecla == 8) {return true;}
  // Patrón de entrada, en este caso solo acepta números
  patron = /[0-9]+/;
  tecla_final = String.fromCharCode(tecla);
  return patron.test(tecla_final);
}

// HABILITA / DESHABILITA CAMPOS DE INGRESO DE DATOS
function habilita(elemento) {
  var d = elemento.value;
  var respuestas = document.querySelectorAll("[id^=respuesta]");
  var i =0;
  if(elemento.type=='radio'){
    i =2;
  } else if (elemento.type=='select-one'){
    i =1;
  }

  if(d == "-1"){
    for (i; i<respuestas.length; i++){
      respuestas[i].disabled = true;
    }
  }else{
    for (i; i<respuestas.length; i++){
      respuestas[i].disabled = false;
    }
  }

}

// EVITA ERRORES POR TECLA F5
function VerificarF5(){
  var tecla=window.event.keyCode;
  if (tecla==116) {
    // alert('F5');
    event.keyCode=0;
    event.returnValue=false;
  }
}

// POSICIONA AL INICIO DE CADA PAGINA
$('html, body').animate({ scrollTop: 0 }, 'fast');
