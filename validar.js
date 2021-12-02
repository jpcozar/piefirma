function validar () {
    tel_fijo = document.querySelector('input[name=tel_fijo]');
    tel_fijo_corp = document.querySelector('input[name=tel_fijo_corp]');
    tel_movil = document.querySelector('input[name=tel_movil]');
    tel_movil_corp = document.querySelector('input[name=tel_movil_corp]');

    estado = true;

    if ( tel_fijo.reportValidity() ) {
        tel_fijo_corp.required = tel_fijo.required;
        if ( ! tel_fijo_corp.reportValidity() ) {
            estado = false;
        }
    } else {
        tel_fijo_corp.required = false;
    }

    if ( tel_movil.reportValidity() ) {
        tel_movil_corp.required = tel_movil.required;
        if ( ! tel_movil_corp.reportValidity() ) {
            estado = false;
        }
    } else {
        tel_movil_corp.required = false;
    }

    return estado;
}

document.addEventListener('DOMContentLoaded', function () {
    tel_fijo = document.querySelector('input[name=tel_fijo]');
    tel_fijo_corp = document.querySelector('input[name=tel_fijo_corp]');
    tel_movil = document.querySelector('input[name=tel_movil]');
    tel_movil_corp = document.querySelector('input[name=tel_movil_corp]');

    arr_tel = Array();
    arr_tel_todos = Array();

    arr_tel.push(tel_fijo);
    arr_tel.push(tel_movil);

    arr_tel_todos.push(tel_fijo);
    arr_tel_todos.push(tel_fijo_corp);
    arr_tel_todos.push(tel_movil);
    arr_tel_todos.push(tel_movil_corp);

    const inputListener = function (e) {return arr_tel.filter(function (i) {return i !== e.target;}).forEach(function (i) {return i.required = !e.target.value.length;})};

    arr_tel.forEach(function (i) { return i.addEventListener('input', inputListener);});
    arr_tel_todos.forEach(function (i) { return i.addEventListener('change', validar);});
});
