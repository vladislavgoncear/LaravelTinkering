<!-- resources/views/films/index.blade.php -->
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
                <th>Titol</th>
                <th>Any de sortida</th>
                <th>Descripcio</th>
                <th>Durada</th>
                <th>Puntuacio</th>
                <th>Accions</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($films as $film)
                <tr>
                    <td>{{ $film->title }}</td>
                    <td>{{ $film->release_year }}</td>
                    <td>{{ $film->description }}</td>
                    <td>{{ $film->length }}</td>
                    <td>{{ $film->rating }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('films.show', $film->id) }}" title="Show"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('films.edit', $film->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
                            <button onclick="showModal({{ $film->id }}, '{{ $film->title }}', '{{ $film->release_year }}', '{{ $film->description }}', '{{ $film->length }}', '{{ $film->rating }}')" title="Delete"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No hi ha films disponibles en aquest moment.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="action-buttons"> <a href="{{ route('films.create') }}" title="Create"><i class="fas fa-plus"></i>Afegir un nou film</a> </div>

    <!-- The Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="card">
                <h3 id="filmTitle"></h3>
                <p id="filmReleaseYear"></p>
                <p id="filmDescription"></p>
                <p id="filmLength"></p>
                <p id="filmRating"></p>
                <p>Are you sure you want to delete this film?</p>
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-buttons">
                        <button type="submit" class="delete">Yes</button>
                        <button type="button" class="cancel" onclick="closeModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function showModal(id, title, release_year, description, length, rating) {
            document.getElementById('filmTitle').innerText = title;
            document.getElementById('filmReleaseYear').innerText = 'Any de sortida: ' + release_year;
            document.getElementById('filmDescription').innerText = 'Descripcio: ' + description;
            document.getElementById('filmLength').innerText = 'Durada: ' + length + ' minuts';
            document.getElementById('filmRating').innerText = 'Puntuacio: ' + rating;
            document.getElementById('deleteForm').action = '/films/' + id;
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
