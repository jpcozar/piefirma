// *** Valores de configuración por defecto

// Mostrar la cabecera o no
// default: var show_header = true;
var show_header = true;

// Enlace de la página por defecto
// default: var home_url = "../piefirma/";
var home_url = "https://hacolxclu.dphaco.ceh.junta-andalucia.es/piefirma/";


// Aplicamos los valores de la configuración
if ( ! show_header ) {
    document.querySelector("#banner").style.display = 'none';
}
document.querySelector("#home_url").href = home_url;
