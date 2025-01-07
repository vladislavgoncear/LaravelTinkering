<!-- resources/views/films/show.blade.php -->
<x-layouts.app>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            max-width: 500px;
            margin: 50px auto;
        }
        .card h1 {
            margin-bottom: 20px;
        }
        .card p {
            margin: 10px 0;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .action-buttons a, .action-buttons button {
            border: none;
            background: none;
            cursor: pointer;
            color: #007bff;
            font-size: 16px;
        }
        .action-buttons a:hover, .action-buttons button:hover {
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

    <div class="card">
        <h1>{{ $film->title }}</h1>
        <p><strong>Any de sortida:</strong> {{ $film->release_year }}</p>
        <p><strong>Descripció:</strong> {{ $film->description }}</p>
        <p><strong>Durada:</strong> {{ $film->length }} minuts</p>
        <p><strong>Puntuació:</strong> {{ $film->rating }}</p>

        <div class="action-buttons">
            <a href="{{ route('films.edit', $film->id) }}" title="Edit"><i class="fas fa-edit"></i></a>
            <button onclick="showModal({{ $film->id }}, '{{ $film->title }}')" title="Delete"><i class="fas fa-trash-alt"></i></button>
        </div>
    </div>

    <!-- The Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="card">
                <h3 id="filmTitle"></h3>
                <p>Estas segur que vols borrar aquest film?</p>
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
        function showModal(id, title) {
            document.getElementById('filmTitle').innerText = title;
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
