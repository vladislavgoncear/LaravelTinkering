<!-- resources/views/cars/create.blade.php -->
<x-layouts.app>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            margin: 20px auto;
            text-align: center;
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .card form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .card form input, .card form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .card form button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }
        .card form button:hover {
            background-color: #0056b3;
        }
    </style>

    <h1 style="text-align: center;">Crear un nou vehicle</h1>

    <div class="card">
        <h3>Introdueix el vehicle</h3>
        <form action="{{ route('cars.store') }}" method="POST">
            @csrf
            <input type="text" name="make" placeholder="Marca" required>
            <input type="text" name="model" placeholder="Modelo" required>
            <input type="number" name="year" placeholder="Any" required>
            <input type="number" name="price" placeholder="Preu" required>
            <button type="submit">Save</button>
        </form>
    </div>
    <x-footer/>
</x-layouts.app>
