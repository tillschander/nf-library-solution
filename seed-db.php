<?php

use App\Entities\Book;
use App\Entities\Movie;
use App\Entities\Record;
use App\Entities\Category;

require_once "bootstrap.php";

$entityManager = getEntityManager();


// Books Category
$books = $entityManager->getRepository(Category::class)->findOneBy(['slug' => 'books']);
if ($books === null) $books = new Category;
$books->setName('Books');
$books->setSlug('books');
$books->setDescription('More than 2000+');
$entityManager->persist($books);

// Movies Category
$movies = $entityManager->getRepository(Category::class)->findOneBy(['slug' => 'movies']);
if ($movies === null) $movies = new Category;
$movies->setName('Movies');
$movies->setSlug('movies');
$movies->setDescription('New and popular');
$entityManager->persist($movies);

// Audio Category
$audio = $entityManager->getRepository(Category::class)->findOneBy(['slug' => 'audio']);
if ($audio === null) $audio = new Category;
$audio->setName('Audio');
$audio->setSlug('audio');
$audio->setDescription('Your favorite');
$entityManager->persist($audio);

// Book Items
$bookData =  [
    [
        "artist" => "Karin Lindberg",
        "releaseDate" => "2021-03-08",
        "name" => "Frühling auf Schottisch",
        "isbn" => "565416966",
        "coverUrl" => "https://is5-ssl.mzstatic.com/image/thumb/Publication114/v4/1d/41/8f/1d418f47-8921-d60f-e22d-3897ab5493c4/1032645242.jpg/200x200bb.png",
    ],
    [
        "artist" => "Roni Loren",
        "releaseDate" => "2020-09-30",
        "name" => "Unvergesslich",
        "isbn" => "567416074",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Publication113/v4/79/fc/44/79fc445d-5448-b26c-e3bd-c807b8e6f079/9783732588169.jpg/200x200bb.png",
    ],
    [
        "artist" => "Lauren Layne",
        "releaseDate" => "2021-03-01",
        "name" => "Wolfes of Wall Street - Kennedy",
        "isbn" => "629636073",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Publication114/v4/30/b1/18/30b11809-86e8-565b-8af4-6347d57f3ba5/9783736315112.jpg/200x200bb.png",
    ],
    [
        "artist" => "Naomi Novik",
        "releaseDate" => "2021-03-01",
        "name" => "Scholomance – Tödliche Lektion",
        "isbn" => "218416878",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Publication124/v4/7b/e0/cb/7be0cb4a-2092-f687-e0d4-e9fc1f28b41c/9783641270278.jpg/200x200bb.png",
    ],
    [
        "artist" => "Thomas Herzberg",
        "releaseDate" => "2021-02-05",
        "name" => "Schneeweißes Sylt",
        "isbn" => "798557043",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Publication114/v4/9d/a1/7d/9da17d3a-5027-e454-918d-18267c19349f/1033061357.jpg/200x200bb.png",
    ],
    [
        "artist" => "Inka Lindberg",
        "releaseDate" => "2021-03-01",
        "name" => "Mit dir falle ich",
        "isbn" => "542302647",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Publication114/v4/72/55/12/725512bf-5823-57f7-a034-5cdbce161ddc/9783733604035.jpg/200x200bb.png",
    ],
    [
        "artist" => "Hannah Luis",
        "releaseDate" => "2021-03-01",
        "name" => "Bretonischer Zitronenzauber",
        "isbn" => "506830636",
        "coverUrl" => "https://is5-ssl.mzstatic.com/image/thumb/Publication123/v4/35/34/a1/3534a1c6-9db5-8ac5-b8da-602ed9426cf2/9783641266158.jpg/200x200bb.png",
    ],
    [
        "artist" => "Vincent Kliesch",
        "releaseDate" => "2021-03-01",
        "name" => "Todesrauschen",
        "isbn" => "380938547",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Publication114/v4/8f/4b/f5/8f4bf5c5-1fc8-03bc-fca0-5b53c38da8a5/9783426461686.jpg/200x200bb.png",
    ],
    [
        "artist" => "Karsten Dusse",
        "releaseDate" => "2019-06-10",
        "name" => "Achtsam morden",
        "isbn" => "943258522",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Publication114/v4/cc/03/de/cc03ded4-6e54-e1cd-98f1-3e94948470d3/9783641238971.jpg/200x200bb.png",
    ],
    [
        "artist" => "Julia Quinn",
        "releaseDate" => "2021-02-05",
        "name" => "Bridgerton - Wie bezaubert man einen Viscount?",
        "isbn" => "187167510",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Publication124/v4/7d/c1/09/7dc10961-c8b5-bb29-1e88-e32079f842da/9783751506083.jpg/200x200bb.png",
    ]
];
foreach ($bookData as $data) {
    $book = new Book;
    $book->setName($data['name']);
    $book->setArtist($data['artist']);
    $book->setReleaseDate(new DateTime($data['releaseDate']));
    $book->setCoverUrl($data['coverUrl']);
    $book->setIsbn($data['isbn']);
    $book->setCategory($books);
    $entityManager->persist($book);
}

// Movie Items
$movieData =  [
    [
        "artist" => "Ric Roman Waugh",
        "releaseDate" => "2020-10-22",
        "name" => "Greenland",
        "coverUrl" => "https://is2-ssl.mzstatic.com/image/thumb/Video124/v4/22/0c/3e/220c3e5c-3530-f4cf-9ba0-e145136cb895/WW.jpg/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "Francis Annan",
        "releaseDate" => "2020-03-06",
        "name" => "Flucht aus Pretoria",
        "coverUrl" => "https://is2-ssl.mzstatic.com/image/thumb/Video124/v4/4e/7a/fd/4e7afda3-f730-8356-e62d-0e19a9b235a7/1055271-artwork.jpg/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "Joel Coen",
        "releaseDate" => "1996-03-08",
        "name" => "Fargo",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Video/v4/11/6a/bc/116abcd2-e725-0468-d87b-62d9c3aaddb8/1600x2400_Fargo_German.jpg/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2019-05-13",
        "name" => "Planet der Affen - Trilogie",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music123/v4/28/dd/ee/28ddee63-6682-dae1-f907-8b45ac95a534/POTA_Trilogy_2000x3000_DE.lsr/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "Quentin Tarantino",
        "releaseDate" => "2007-07-19",
        "name" => "Death Proof - Todsicher",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Video/64/07/f5/mzi.mlqdorrk.tif/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2019-01-10",
        "name" => "Predator - Collection (4 Filme)",
        "coverUrl" => "https://is2-ssl.mzstatic.com/image/thumb/Music118/v4/13/39/22/1339224d-2770-5cc7-49aa-82c40be767d7/Predator_4Pack_2000x3000_DE.lsr/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2018-05-31",
        "name" => "Maze Runner Trilogie",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Features128/v4/5b/23/3f/5b233f6c-846c-4509-081c-ab9813b5d42a/mza_4355738810729761328.lsr/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2018-03-30",
        "name" => "Stirb langsam + Stirb langsam 2",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Music118/v4/ed/c9/2b/edc92b16-8e44-fa61-647e-bc2aa88feb19/DieHard_2pk_2000x3000_DE.lsr/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2018-01-24",
        "name" => "Independence Day 2-Filme-Kollektion",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music128/v4/76/70/35/767035f8-db1e-35d8-adae-2311f5756288/contsched.xqoibvkc.lsr/200x200bb.png",
        "duration" => "1:50"
    ],
    [
        "artist" => "20th Century Fox Film",
        "releaseDate" => "2018-03-30",
        "name" => "Aliens vs. Predator: Collection",
        "coverUrl" => "https://is4-ssl.mzstatic.com/image/thumb/Music128/v4/74/e6/c2/74e6c22c-8414-688b-0568-b1086c9f799b/AVP_1-2_2000x3000_DE.lsr/200x200bb.png",
        "duration" => "1:50"
    ]
];
foreach ($movieData as $data) {
    $movie = new Movie;
    $movie->setName($data['name']);
    $movie->setArtist($data['artist']);
    $movie->setReleaseDate(new DateTime($data['releaseDate']));
    $movie->setCoverUrl($data['coverUrl']);
    $movie->setDuration($data['duration']);
    $movie->setCategory($movies);
    $entityManager->persist($movie);
}

// Audio Items
$audioData =  [
    [
        "artist" => "Bausa",
        "releaseDate" => "2021-02-26",
        "name" => "100 Pro",
        "label" => "Downbeat Records GmbH & Co. KG",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music123/v4/7a/a2/55/7aa25575-d320-6051-2540-74bce1ce4f2c/190295194062.jpg/200x200bb.png",
    ],
    [
        "artist" => "Kings of Leon",
        "releaseDate" => "2021-03-05",
        "name" => "When You See Yourself",
        "label" => "RCA Records",
        "coverUrl" => "https://is2-ssl.mzstatic.com/image/thumb/Music124/v4/4e/f6/dd/4ef6dd54-aea0-18b8-966a-e902750d8cd7/886448318903.jpg/200x200bb.png",
    ],
    [
        "artist" => "Die drei ???",
        "id" => "1529406670",
        "releaseDate" => "2021-01-15",
        "name" => "Folge 208: Kelch des Schicksals",
        "label" => "Sony Music Entertainment Germany GmbH",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Music124/v4/95/df/21/95df2132-063b-5ca1-f2aa-ff0ffa3db80e/886447878392.jpg/200x200bb.png",
    ],
    [
        "artist" => "Verschiedene Interpreten",
        "id" => "575836891",
        "releaseDate" => "2012-11-05",
        "name" => "Die 30 besten Schlaflieder für Kinder",
        "label" => "Die Lamp und Leute Entertainment GmbH",
        "coverUrl" => "https://is2-ssl.mzstatic.com/image/thumb/Music/v4/6d/0e/6f/6d0e6fe6-e527-cdd9-0db7-b8af5859e00f/cover.jpg/200x200bb.png",
    ],
    [
        "artist" => "Cro",
        "id" => "1552023403",
        "releaseDate" => "2021-04-30",
        "name" => "trip",
        "label" => "truworks records",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music124/v4/87/99/22/87992285-c7d9-d506-2563-278d5c641c69/20UMGIM88246.rgb.jpg/200x200bb.png",
    ],
    [
        "artist" => "Benj Pasek & Justin Paul, Hugh Jackman",
        "id" => "1299856714",
        "releaseDate" => "2017-12-08",
        "name" => "The Greatest Showman (Original Motion Picture Soundtrack)",
        "label" => "Atlantic Recording Corporation",
        "coverUrl" => "https://is5-ssl.mzstatic.com/image/thumb/Music128/v4/c1/7b/a9/c17ba975-34aa-ee68-d3c9-e1db840fa06b/075679886613.jpg/200x200bb.png",
    ],
    [
        "artist" => "TKKG",
        "id" => "1542192404",
        "releaseDate" => "2021-02-05",
        "name" => "Folge 217: Tödliche Klarinette",
        "label" => "Sony Music Entertainment Germany GmbH",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music114/v4/3f/c8/47/3fc8470e-4c4f-4c16-f222-1097a434c697/886448206224.jpg/200x200bb.png",
    ],
    [
        "artist" => "Bibi Blocksberg",
        "id" => "1548517211",
        "releaseDate" => "2021-02-05",
        "name" => "Folge 137: Ein verrückter Ausflug",
        "label" => "KIDDINX Studios GmbH",
        "coverUrl" => "https://is5-ssl.mzstatic.com/image/thumb/Music124/v4/60/8a/a6/608aa63e-b9fc-23b3-f15c-2bb5301c8879/190295025687.jpg/200x200bb.png",
    ],
    [
        "artist" => "Die drei ??? Kids",
        "id" => "1539905640",
        "releaseDate" => "2021-02-05",
        "name" => "Folge 80: Gefährlicher Nebel",
        "label" => "Sony Music Entertainment Germany GmbH",
        "coverUrl" => "https://is3-ssl.mzstatic.com/image/thumb/Music114/v4/94/97/a0/9497a070-991e-ae75-2122-3849aa28d842/886448759508.jpg/200x200bb.png",
    ],
    [
        "artist" => "Bibi und Tina",
        "id" => "1538603381",
        "releaseDate" => "2021-01-22",
        "name" => "Folge 100: Das Waisenfohlen (Extra lange Folge)",
        "label" => "KIDDINX Studios GmbH",
        "coverUrl" => "https://is1-ssl.mzstatic.com/image/thumb/Music114/v4/d5/57/21/d557214e-163d-2b97-0ee0-42cad31f1d1a/190295082338.jpg/200x200bb.png",
    ]
];
foreach ($audioData as $data) {
    $record = new Record;
    $record->setName($data['name']);
    $record->setArtist($data['artist']);
    $record->setReleaseDate(new DateTime($data['releaseDate']));
    $record->setCoverUrl($data['coverUrl']);
    $record->setLabel($data['label']);
    $record->setCategory($audio);
    $entityManager->persist($record);
}

$entityManager->flush();
