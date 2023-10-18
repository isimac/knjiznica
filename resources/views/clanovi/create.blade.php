
    <h1>Dodaj Člana</h1>
    <form action="{{ route('clanovi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ime">Ime:</label>
            <input type="text" class="form-control" id="ime" name="ime" required>
        </div>
        <div class="form-group">
            <label for="prezime">Prezime:</label>
            <input type="text" class="form-control" id="prezime" name="prezime" required>
        </div>
        <div class="form-group">
            <label for="clanski_broj">Članski Broj:</label>
            <input type="text" class="form-control" id="clanski_broj" name="clanski_broj" required>
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>

