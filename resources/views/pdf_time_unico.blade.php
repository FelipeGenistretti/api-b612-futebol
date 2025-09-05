<h1>{{ $time->nome }} - Relatório de Jogadores</h1>

<table border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Posição</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody>
        @foreach($time->jogadores as $jogador)
            <tr>
                <td>{{ $jogador->nome }}</td>
                <td>{{ $jogador->posicao }}</td>
                <td>{{ $jogador->idade }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
