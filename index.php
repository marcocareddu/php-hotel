<?php

// Create Array
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];

// Get value from page
$there_is_Parking = $_GET['parking'] ?? '';
$input_vote = $_GET['vote'] ?? 0;
var_dump($there_is_Parking);

// Create variable with filters
$filtered_hotels = [];
$temp_filtered_hotels = [];

// Filter from vote
foreach ($hotels as $hotel) {
    if ($hotel['vote'] > $input_vote) {
        array_push($filtered_hotels, $hotel);
    }
}

// Filter from parking
if ($there_is_Parking === 'on') {
    foreach ($filtered_hotels as $hotel) {
        if ($hotel['parking']) {
            array_push($temp_filtered_hotels, $hotel);
        }
    }
    $filtered_hotels = $temp_filtered_hotels;
}

?>



<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>PHP L Calda</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="mt-3">

            <h1>HOTEL</h1>
            <div class="pt-3">

                <!-- Temporary Inputs -->
                <div class="inputs d-flex justify-content-center">
                    <h3>Filtra per voto</h3>
                    <form class="form-check d-flex align-items-center">
                        <div>
                            <input type="number" step="1" min="0" name="vote" class="form-control" placeholder="Voto">
                        </div>
                        <div class="form-check form-switch px-5">
                            <input class="form-check-input" type="checkbox" id="parking" name="parking">
                            <label class="form-check-label" for="parking">Con parcheggio</label>
                        </div>
                        <button class="btn btn-primary">Cerca</button>
                    </form>
                </div>

                <div class="pt-3">

                    <!-- Table Start Here -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Parcheggio</th>
                                <th scope="col">Voto</th>
                                <th scope="col">Distanza dal centro</th>
                            </tr>
                        </thead>

                        <tbody>
                            <!-- Dynamic table rows -->
                            <?php foreach ($filtered_hotels as $hotel) : ?>
                                <tr>
                                    <td><?= $hotel['name'] ?></td>
                                    <td><?= $hotel['description'] ?></td>
                                    <td><?= $hotel['parking'] ?></td>
                                    <td><?= $hotel['vote'] ?></td>
                                    <td><?= $hotel['distance_to_center'] ?>km</td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</body>

</html>