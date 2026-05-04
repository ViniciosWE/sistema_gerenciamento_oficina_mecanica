setTimeout(function () {
    let alertas = document.querySelectorAll('.auto-close');

    alertas.forEach(function (alerta) {
        alerta.style.transition = "opacity 0.5s";
        alerta.style.opacity = "0";

        setTimeout(() => alerta.remove(), 500);
    });

}, 5000);