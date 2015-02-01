<?php

 require_once __DIR__ . '/Database.php'; 
 require_once __DIR__ . '/GenreQuery.php';
 require_once __DIR__ . '/ArtistQuery.php';
 require_once __DIR__ . '/Song.php';


 $artistQuery = new ArtistQuery();
 $genreQuery = new GenreQuery();
 $genresList = $genreQuery->getAll();
 $artistsList = $artistQuery->getAll();
 

 if( $_POST["title"] && $_POST["genre"] && $_POST["artist"] && $_POST["price"])
  {
     $song = new Song($_POST["title"],$_POST["artist"],$_POST["genre"],$_POST["price"]);
     $song->save();

     exit();
  }

?>


<html>
	<head>
		<title>Song Insert</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="js/bootstrap.min.js" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<h2>Song Insert</h2>
			<form role="form" method="post">
				<div class="form-group">
      				<label for="title">Title:</label>
      				<input class="form-control" name="title" id="title" placeholder="Title">
    			</div>

    			<div>
      				<label for="artist">Artist:</label>
      				<select class="form-control" name="artist" id="artist" placeholder="Artist">
      					<?php foreach($artistsList as $artist) : ?>
      					<div>
      						<option value = "<?php $artistQuery->getArtistId($artist->artist_name) ?>"> <?php echo $artist->artist_name ?> </option>
      					</div>
      					<?php endforeach; ?>
   					</select>
   					
    			</div>

    			<div class="form-group">
      				<label for="genre">Genre:</label>
      				<select class="form-control" name="genre" id="genre" placeholder="Genre">
      					<?php foreach($genresList as $genre) : ?>
      					<option value = "<?php $genreQuery->getGenreId($genre->genre) ?>"> <?php echo $genre->genre ?> </option>
      					<?php endforeach; ?>
					</select>
					
    			</div>

    			<div class="form-group">
      				<label for="title">Price:</label>
      				<input class="form-control" name="price" id="price" placeholder="Price">
    			</div>

    			

    			<div class="form-group">
      				<button type="submit" class="btn">Submit</button>
    			</div>

    			
    	</div>

    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>

    </body>
</html>