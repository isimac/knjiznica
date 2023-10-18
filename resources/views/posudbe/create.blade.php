
    <h1>Stvaranje Posudbe</h1>
    <form method="POST" action="{{ route('posudbe.store') }}">
        @csrf
        <div class="form-group">
            <label for="clan_id">Član:</label>
            <select name="clan_id" id="clan_id">
                @foreach ($clanovi as $clan)
                    <option value="{{ $clan->id }}">{{ $clan->ime }} {{ $clan->prezime }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="knjiga_id">Knjiga:</label>
            <select name="knjiga_id" id="knjiga_id">
                @foreach ($knjige as $knjiga)
                    <option value="{{ $knjiga->id }}">{{ $knjiga->naslov }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="datum_posudbe">Datum Posudbe:</label>
            <input type="date" name="datum_posudbe" id="datum_posudbe">
        </div>
        <button type="submit">Spremi</button>
    </form>
    <a href="{{ route('posudbe.index') }}">Povratak na popis posudbi</a>

