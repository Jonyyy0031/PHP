<?php
$name = "Miguel";
$isDead = true;
$age = 70;
$ageBool = (bool) 44; //type casting
$newAge = $age . 4; //Concatenacion con . pues + es suma
is_string($name);
// echo gettype($age);
// var_dump($isDead); // Tipo de dato pero lo muestra en la pagina
$output = "Hola $name, con una edad de $age"; // \para ignorar el dolar
//Constantes
define('LOGO_URL', 'URL'); // Puede redeclararse sin petar la pagina
const NOMBRE = 'Miguel'; // no pueden haber constantes dinamicas (tiempo de ejecucion/evaluacion)
$isOld = $age > 40;
$outputAge = match (true) { //Switch en php mejor
    $age < 2 => "Eres un bebe, $name",
    $age < 10 => "Eres un nino , $name",
    $age === 18 => "eres gei gei, $name",
    $age < 40 => "Eres gei, $name",
    $age >= 40 => "Eres gei viejo, $name",
    default => "Adulto , $name"
};

$Bestlanguages = ["php", 1, true];
$Bestlanguages[] = "Java";

$person = [
    "name" => "Miguel",
    "age" => 78,
    "isDev" => true,
    "languages" => ["php", "java", "feral"]
];

$person["name"] = "perhap" ; //diccionario

?> <!-- Variables, Numeros al principio no se puede o dolar al final
    Tipado dinamico, debil y gradual (Cambio en tiempo de ejecucion,
    debil igual a JS convierte los tipos de las variables segun sea necesario
    opcionalmente se puede poner explicitamente el tipo pero en ciertos contextos) -->


<!-- Api -->
<?php

    const API_URL = "https://whenisthenextmcufilm.com/api";
    $ch = curl_init(API_URL);
    //Indicar que queremos recibir el resultado y no mostrarla
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    /* Ejecutar la peticion y guardamos el resultado */
    $result = curl_exec($ch); //forma basica de llamar una API sin dependencias
    //Alternativa filegetcontents
    // $result = file_get_contents(API_URL) //Solo si quieres hacer un GET
    $data = json_decode($result, true);
    curl_close($ch);

?>
<head>
    <title>Marvel</title>
    <meta charset="UTF-8" />
    <meta name="description" content="prueba">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    />
</head>
<main>
    <pre style="font-size: 8px; overflow: scroll; height: 250px;">
        <?php var_dump($data) ?>
    </pre>
    <section>
        <img src=" <?= $data["poster_url"]; ?>" alt="poster de <?= $data["title"] ?>" width="300"
        style="border-radius: 20px;"/>
    </section>
    <hgroup>
        <h2><?= $data["title"]; ?> se estrena en <?= $data["days_until"] ?> dias</h2>
        <p>Fecha de estreno: <?= $data["release_date"] ?> </p>
        <p>La siguiente es: <?= $data["following_production"]["title"] ?></p>
    </hgroup>
</main>

<!-- <ul>
    <?php foreach ($Bestlanguages as $key => $language) : ?>
        <li><?= $key . " " . $language ?></li>
    <?php endforeach; ?>
</ul>

<?php if ($isOld) : ?>
    <h2>Jodido</h2>;
<?php elseif ($isDead) : ?>
    <h2>pendejo</h2>;
<?php else : ?>
    <h3>Jaj</h3>;
<?php endif; ?> manera diferente de escribir sentencias IF -->


<!-- <h3>
    El mejor lenguaje es <?= $Bestlanguages[3] ?>
</h3> -->


<!-- <img src=" <?= LOGO_URL ?>" alt="prueba" width="200" />
<h1>
    <?= $outputAge ?> <!-- echo = ?= = console.log-->
<!-- </h1> picocss --> 

<style>
    :root {
        color-scheme: light dark;
    }
    
    body {
        display: grid;
        place-content: center;
    }

    section{
        display: flex;
        justify-content: center;
        text-align: center;
    }

    hgroup{
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    img{
        margin: 0 auto;
    }
    
</style>

