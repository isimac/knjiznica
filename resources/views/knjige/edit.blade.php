
    <h1>Uredi Knjigu</h1>
    <form action="{{ route('knjige.update', $knjiga->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="naslov">Naslov:</label>
            <input type="text" class="form-control" id="naslov" name="naslov" value="{{ $knjiga->naslov }}" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" id="autor" name="autor" value="{{ $knjiga->autor }}" required>
        </div>
        <div class="form-group">
            <label for="godina_izdanja">Godina Izdanja:</label>
            <input type="number" class="form-control" id="godina_izdanja" name="godina_izdanja" value="{{ $knjiga->godina_izdanja }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Spremi</button>
    </form>

