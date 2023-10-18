
    <h1>Popis Članova</h1>
    <a href="{{ route('clanovi.create') }}" class="btn btn-primary">Dodaj Člana</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Članski Broj</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clanovi as $clan)
                <tr>
                    <td>{{ $clan->id }}</td>
                    <td>{{ $clan->ime }}</td>
                    <td>{{ $clan->prezime }}</td>
                    <td>{{ $clan->clanski_broj }}</td>
                    <td>
                        <a href="{{ route('clanovi.show', $clan->id) }}" class="btn btn-info">Prikaži</a>
                        <a href="{{ route('clanovi.edit', $clan->id) }}" class="btn btn-primary">Uredi</a>
                        <form action="{{ route('clanovi.destroy', $clan->id) }}" onsubmit="return confirm('Jeste li sigurni da želite obrisati člana?');" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

