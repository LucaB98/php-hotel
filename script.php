<?php

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

    $headings = array_keys($hotels[0]);

    // controllo se mi arriva un filtro parcheggio
    if(isset($_GET['parking'])){
        $checked = 'checked';

        $filtered_hotels = [];

        foreach($hotels as $hotel){
            if($hotel['parking']) $filtered_hotels[] = $hotel;
        }
        $hotels =  $filtered_hotels;
    }

   
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>

<!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- font-awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer">

<!-- css -->
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<main class="main">
    <div class="container mt-5">
        <h1 class="my-5">Tabella hotel</h1>
        <form action="" methods="GET">
            <div class="d-flex justify-content-between align-items-center my-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox"  id="parking" name="parking" <?= $checked ?? '' ?>>
                <label class="form-check-label" for="parking">
                    Mostra solo hotel con parcheggio
                </label>
            </div>
                <button type="submit" class="btn btn-sm btn-primary">Filtra</button>
            </div>
        </form>
        <table class="table table-striped">
                <tr>
                <?php foreach($headings as $heading) : ?>
                    <th scope="col"><?= ucfirst($heading) ?></th>
                <?php endforeach; ?>
                </tr>
                <?php foreach($hotels as $hotel) : ?>
                    <tr>
                       <th scope="col"><?= $hotel['name'] ?></th>
                       <td><?= $hotel['description'] ?></td>
                       <td><?= $icon = $hotel['parking']? '<i class="fa-solid fa-circle-check text-success"></i>' : '<i class="fa-solid fa-circle-xmark text-danger"></i>' ?></td>
                       <td><?= $hotel['vote'] ?>/5</td>
                       <td><?= $hotel['distance_to_center'] ?> km</td>
                    </tr>
                <?php endforeach ?>
        </table>
    </div>
</main>



<!-- js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>