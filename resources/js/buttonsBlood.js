document.addEventListener("DOMContentLoaded", function () {
    
    var botonCargar = document.getElementById('cargarDatos');
    var botonOcultar = document.getElementById('OcultarDatos');
    var grafico1 = document.getElementById('grafico1');
    var grafico2 = document.getElementById('grafico2');

    if (botonCargar && botonOcultar && grafico1 && grafico2) {
        botonOcultar.style.display = 'none';
        grafico1.style.display = 'none';
        grafico2.style.display = 'none';

        botonCargar.addEventListener('click', function () {
            botonCargar.style.display = 'none';
            botonOcultar.style.display = 'block';
            grafico1.style.display = 'block';
            grafico2.style.display = 'block';
        });

        botonOcultar.addEventListener('click', function () {
            botonCargar.style.display = 'block';
            botonOcultar.style.display = 'none';
            grafico1.style.display = 'none';
            grafico2.style.display = 'none';
        });
    }
});
