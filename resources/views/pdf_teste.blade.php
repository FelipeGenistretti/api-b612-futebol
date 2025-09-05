<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        h1 { color: #333; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Relatório de Times</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cidade</th>
                <th>Estádio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($times as $time)
                <tr>
                    <td>{{ $time->id }}</td>
                    <td>{{ $time->nome }}</td>
                    <td>{{ $time->cidade }}</td>
                    <td>{{ $time->estadio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
