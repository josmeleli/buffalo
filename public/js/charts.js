document.addEventListener("DOMContentLoaded", function() {
    const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    const datos = Array(12).fill(0); // Inicializar con ceros

    // Rellenar los datos en los meses correspondientes
    insumosPorMes.forEach(insumo => {
        datos[insumo.mes - 1] = insumo.cantidad;
    });

    const options = {
        chart: {
            type: 'bar',
            height: 350
        },
        series: [{
            name: 'Insumos',
            data: datos
        }],
        xaxis: {
            categories: meses
        }
    };

    const chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});
