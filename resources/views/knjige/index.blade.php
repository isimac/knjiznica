
    <h1>Popis Knjiga</h1>
    <a href="{{ route('knjige.create') }}" class="btn btn-primary">Dodaj Knjigu</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Naslov</th>
                <th>Autor</th>
                <th>Godina Izdanja</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($knjige as $knjiga)
                <tr>
                    <td>{{ $knjiga->id }}</td>
                    <td>{{ $knjiga->naslov }}</td>
                    <td>{{ $knjiga->autor }}</td>
                    <td>{{ $knjiga->godina_izdanja }}</td>
                    <td>
                        <a href="{{ route('knjige.show', $knjiga->id) }}" class="btn btn-info">Prikaži</a>
                        <a href="{{ route('knjige.edit', $knjiga->id) }}" class="btn btn-primary">Uredi</a>
                        <form action="{{ route('knjige.destroy', $knjiga->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

