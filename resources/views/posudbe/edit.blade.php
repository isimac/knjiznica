
    <h1>Uređivanje Posudbe</h1>
    <form method="POST" action="{{ route('posudbe.update', $posudba->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="clan_id">Član:</label>
            <select name="clan_id" id="clan_id">
                @foreach ($clanovi as $clan)
                    <option value="{{ $clan->id }}" {{ $clan->id == $posudba->clan_id ? 'selected' : '' }}>
                        {{ $clan->ime }} {{ $clan->prezime }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="knjiga_id">Knjiga:</label>
            <select name="knjiga_id" id="knjiga_id">
                @foreach ($knjige as $knjiga)
                    <option value="{{ $knjiga->id }}" {{ $knjiga->id == $posudba->knjiga_id ? 'selected' : '' }}>
                        {{ $knjiga->naslov }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="datum_posudbe">Datum Posudbe:</label>
            <input type="date" name="datum_posudbe" id="datum_posudbe" value="{{ $posudba->datum_posudbe }}">
        </div>

        <div class="form-group">
    <label for="datum_povratka">Datum Povratka:</label>
    <input type="date" name="datum_povratka" id="datum_povratka" value="{{ $posudba->datum_povratka }}">
</div>

        <button type="submit">Spremi</button>
    </form>
    <a href="{{ route('posudbe.index') }}">Povratak na popis posudbi</a>

