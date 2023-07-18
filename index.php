<?php

// Import Array data
include 'includes/data/hotels_data.php';


// Get value from page
$there_is_Parking = $_GET['parking'] ?? '';
$input_vote = $_GET['vote'] ?? 0;

// Create variable with filters
$filtered_hotels = [];
$temp_filtered_hotels = [];

// Filter from vote
foreach ($hotels as $hotel) {
    if ($hotel['vote'] >= $input_vote) {
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

    <!-- Font Awesome -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==' crossorigin='anonymous'>

    <!-- CSS -->
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <title>PHP L Calda</title>
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="mt-3">

            <h1>HOTEL</h1>
            <div class="pt-3">

                <!-- Include Inputs -->
                <?php include 'includes/input.inc' ?>


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
                                    <td><?= $hotel['parking'] ? '<span class="badge rounded-pill bg-success">V</span>' : '<span class="badge rounded-pill bg-danger">X</span>'; ?></td>
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