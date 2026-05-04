<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Relatório</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 20px;
            border-bottom: 2px solid #dc3545;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            color: #dc3545;
            text-transform: uppercase;
        }

        .sub {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }

        .container {
            padding: 0 20px;
        }

        .info-box {
            background: #f8f9fa;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #dc3545;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }

        td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 11px;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        .footer {
            text-align: center;
            font-size: 10px;
            margin-top: 30px;
            color: #777;
        }

        .badge {
            padding: 3px 6px;
            background: #28a745;
            color: white;
            border-radius: 4px;
            font-size: 10px;
        }

        .danger {
            background: #dc3545;
        }

        .warning {
            background: #ffc107;
            color: #000;
        }

        .total {
            text-align: right;
            margin-top: 10px;
            font-weight: bold;
            font-size: 14px;
        }

        .titulo{
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Oficina Mecânica VW</h2>
        <div class="sub">
            Relatório gerado em {{ date('d/m/Y H:i') }}
        </div>
    </div>

    <div class="container">

        @yield('content')

    </div>

    <div class="footer">
        Sistema de Gestão Oficina VW - Relatório gerado automaticamente
    </div>

</body>

</html>