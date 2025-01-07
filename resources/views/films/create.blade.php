<!-- resources/views/films/create.blade.php -->
<x-layouts.app>
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
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

    <div class="form-container">
        <h1>Crear un nou Film</h1>
        <form action="{{ route('films.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Títol</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="release_year">Any de sortida</label>
                <input type="number" id="release_year" name="release_year" required>
            </div>
            <div class="form-group">
                <label for="description">Descripció</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="length">Durada (minuts)</label>
                <input type="number" id="length" name="length" required>
            </div>
            <div class="form-group">
                <label for="rating">Puntuació</label>
                <input type="text" id="rating" name="rating" required>
            </div>
            <div class="form-group">
                <button type="submit">Crear Film</button>
            </div>
        </form>
    </div>
</x-layouts.app>
