
    <h1>Popis Posudbi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Član</th>
                <th>Knjiga</th>
                <th>Datum Posudbe</th>
                <th>Datum Povratka</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posudbe as $posudba)
                <tr>
                    <td>{{ $posudba->id }}</td>
                    <td>{{ $posudba->clan->ime }} {{ $posudba->clan->prezime }}</td>
                    <td>{{ $posudba->knjiga->naslov }}</td>
                    <td>{{ $posudba->datum_posudbe }}</td>
                    <td>{{ $posudba->datum_povratka }}</td>
                    <td>
                        <a href="{{ route('posudbe.show', $posudba->id) }}">Prikaži</a>
                        <a href="{{ route('posudbe.edit', $posudba->id) }}">Uredi</a>
                        <form action="{{ route('posudbe.destroy', $posudba->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('posudbe.create') }}">Stvori novu posudbu</a>
