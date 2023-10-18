
    <h1>Uredi Člana</h1>
    <form action="{{ route('clanovi.update', $clan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="ime">Ime:</label>
            <input type="text" class="form-control" id="ime" name="ime" value="{{ $clan->ime }}" required>
        </div>
        <div class="form-group">
            <label for="prezime">Prezime:</label>
            <input type="text" class="form-control" id="prezime" name="prezime" value="{{ $clan->prezime }}" required>
        </div>
        <div class="form-group">
            <label for="clanski_broj">Članski Broj:</label>
            <input type="text" class="form-control" id="clanski_broj" name="clanski_broj" value="{{ $clan->clanski_broj }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>
