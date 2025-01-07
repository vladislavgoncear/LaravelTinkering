<!-- resources/views/films/edit.blade.php -->
<x-layouts.app>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            margin: 50px auto;
        }
        .card h1 {
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="card">
        <h1>Editar Film</h1>
        <form action="{{ route('films.update', $film->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" id="title" name="title" value="{{ $film->title }}" required>
            </div>
            <div class="form-group">
                <label for="release_year">Any de sortida</label>
                <input type="number" id="release_year" name="release_year" value="{{ $film->release_year }}" required>
            </div>
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea id="description" name="description" rows="4" required>{{ $film->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="length">Durada (minuts)</label>
                <input type="number" id="length" name="length" value="{{ $film->length }}" required>
            </div>
            <div class="form-group">
                <label for="rating">Puntuació</label>
                <input type="text" id="rating" name="rating" value="{{ $film->rating }}" required>
            </div>
            <div class="form-group">
                <button type="submit">Guardar Canvis</button>
            </div>
        </form>
    </div>
</x-layouts.app>
