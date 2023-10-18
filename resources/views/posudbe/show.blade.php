
    <h1>Prikaz Posudbe</h1>
    <p>ID: {{ $posudba->id }}</p>
    <p>Član: {{ $posudba->clan->ime }} {{ $posudba->clan->prezime }}</p>
    <p>Knjiga: {{ $posudba->knjiga->naslov }}</p>
    <p>Datum Posudbe: {{ $posudba->datum_posudbe }}</p>
    <p>Datum Povratka: {{ $posudba->datum_povratka }}</p>
    <a href="{{ route('posudbe.index') }}">Povratak na popis posudbi</a>

