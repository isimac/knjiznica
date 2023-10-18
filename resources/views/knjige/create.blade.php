
    <h1>Dodaj Knjigu</h1>
    <form action="{{ route('knjige.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="naslov">Naslov:</label>
            <input type="text" class="form-control" id="naslov" name="naslov" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" required>
        </div>
        <div class="form-group">
            <label for="godina_izdanja">Godina Izdanja:</label>
            <input type="number" class="form-control" id="godina_izdanja" name="godina_izdanja" required>
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>

