<!-- resources/views/welcome.blade.php -->
<x-layouts.app>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }
        .card {
            display: inline-block;
            width: 300px;
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .card h2 {
            margin: 20px 0 10px;
        }
        .card p {
            margin: 10px 0;
        }
        .card a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .card a:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Benvingut al nostre catàleg</h1>
        <p>Explora la nostra col·lecció de pel·lícules i cotxes. Tria una categoria per començar.</p>
        <div class="card">
            <h2>Pel·lícules</h2>
            <p>Descobreix la nostra extensa col·lecció de pel·lícules. Des de clàssics fins a les últimes estrenes, tenim alguna cosa per a tothom.</p>
            <a href="{{ route('films.index') }}">Veure pel·lícules</a>
        </div>
        <div class="card">
            <h2>Cotxes</h2>
            <p>Explora el nostre catàleg de cotxes. Troba el cotxe perfecte per a tu entre la nostra àmplia gamma d'opcions.</p>
            <a href="{{ route('cars.index') }}">Veure cotxes</a>
        </div>
    </div>
</x-layouts.app>
