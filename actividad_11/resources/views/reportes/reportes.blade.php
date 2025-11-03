<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reportes de Ventas</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="{{ asset('css/reportes.css') }}">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background: #f9f9f9;
    }
    h1, h2 {
      text-align: center;
    }
    .chart-container {
      width: 80%;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body >
  <h1>Reportes de Ventas</h1>
<section style="display: flex; padding:0rem 6rem; gap:5rem">
  <!-- Reporte de ventas por producto -->
  <div class="chart-container" height="30%">
    <h2>Ventas por Producto</h2>
    <canvas id="ventasProducto" height="30%" ></canvas>
  </div>

  <!-- Reporte de ventas por fecha -->
  <div class="chart-container">
    <h2>Ventas por Fecha</h2>
    <canvas id="ventasFecha"></canvas>
  </div>

  <!-- Reporte de productos agotados -->
  <div class="chart-container" height="30%">
    <h2>Productos Agotados</h2>
    <canvas id="productosAgotados" height="30%"></canvas>
  </div>

</section>
  




  <script>
    // === Gráfico 1: Ventas por Producto ===
    const ctx1 = document.getElementById('ventasProducto');
    new Chart(ctx1, {
      type: 'bar',
      data: {
        labels: ['Laptop', 'Celular', 'Teclado', 'Mouse', 'Audífonos'],
        datasets: [{
          label: 'Unidades Vendidas',
          data: [15, 25, 10, 18, 8],
          backgroundColor: ['#007bff', '#28a745', '#ffc107', '#17a2b8', '#dc3545']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
          title: { display: true, text: 'Ventas por Producto (Enero - Marzo)' }
        }
      }
    });

    // === Gráfico 2: Ventas por Fecha ===
    const ctx2 = document.getElementById('ventasFecha');
    new Chart(ctx2, {
      type: 'line',
      data: {
        labels: ['01/11', '02/11', '03/11', '04/11', '05/11'],
        datasets: [{
          label: 'Ventas Totales (S/)',
          data: [1200, 900, 1500, 1800, 1000],
          borderColor: '#fe8008',
          tension: 0.3,
          fill: false
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
          title: { display: true, text: 'Ventas por Fecha (Semana Actual)' }
        }
      }
    });

    // === Gráfico 3: Productos Agotados ===
    const ctx3 = document.getElementById('productosAgotados');
    new Chart(ctx3, {
      type: 'pie',
      data: {
        labels: ['Laptop', 'Celular', 'Teclado'],
        datasets: [{
          label: 'Productos Agotados',
          data: [1, 2, 1],
          backgroundColor: ['#d9534f', '#f0ad4e', '#5bc0de']
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' },
          title: { display: true, text: 'Productos Agotados' }
        }
      }
    });
  </script>
</body>
</html>
