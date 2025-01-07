<!-- resources/views/cars/index.blade.php -->
<x-layouts.app>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main {
            flex: 1;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        table {
            width: 80%;
            margin: 20px 0;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .action-buttons a, .action-buttons form {
            display: inline-block;
        }
        .action-buttons button, .action-buttons a {
            border: none;
            background: none;
            cursor: pointer;
            color: #007bff;
            font-size: 16px;
        }
        .action-buttons button:hover, .action-buttons a:hover {
            color: #0056b3;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 10px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .card p {
            margin: 5px 0;
        }
        .modal-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .modal-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 50%;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .modal-buttons .delete {
            background-color: #28a745;
        }
        .modal-buttons .cancel {
            background-color: #dc3545;
        }
    </style>

    <div class="container">


        <table>
            <thead>
            <tr>
                <th>Marca</th>
                <th>Model</th>
                <th>Any</th>
                <th>Preu</th>
                <th>Accions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($cars as $car)
                <tr>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->price }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('cars.show', $car->id) }}" title="Show"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('cars.edit', $car->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                            <button onclick="showModal({{ $car->id }}, '{{ $car->make }}', '{{ $car->model }}', {{ $car->year }}, {{ $car->price }})" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No hi ha vehicles disponibles en aquest moment.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="action-buttons"> <a href="{{ route('cars.create') }}" title="Create"><i class="fas fa-plus"></i>Afegir un nou vehicle</a> </div>

    <!-- The Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="card">
                <h3 id="carMakeModel"></h3>
                <p id="carYear"></p>
                <p id="carPrice"></p>
                <p>Estas segur de borrar aquest vehicle?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-buttons">
                        <button type="submit" class="delete">Si</button>
                        <button type="button" class="cancel" onclick="closeModal()">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showModal(id, make, model, year, price) {
            document.getElementById('carMakeModel').innerText = make + ' ' + model;
            document.getElementById('carYear').innerText = 'Any: ' + year;
            document.getElementById('carPrice').innerText = 'Preu: ' + price;
            document.getElementById('deleteForm').action = '/cars/' + id;
            document.getElementById('deleteModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('deleteModal').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == document.getElementById('deleteModal')) {
                closeModal();
            }
        }
    </script>
</x-layouts.app>
