<!-- resources/views/cars/edit.blade.php -->
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

    <div class="card">
        <h3>Edita el vehicle</h3>
        <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="make" value="{{ $car->make }}" placeholder="Marca" required>
            <input type="text" name="model" value="{{ $car->model }}" placeholder="Modelo" required>
            <input type="number" name="year" value="{{ $car->year }}" placeholder="Any" required>
            <input type="number" name="price" value="{{ $car->price }}" placeholder="Preu" required>
            <button type="submit">Save</button>
        </form>
    </div>
</x-layouts.app>
