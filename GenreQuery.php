<?php 

require_once __DIR__ . '/Database.php';

class GenreQuery extends Database {

	public function __construct()
	{
		
		parent::__construct();

	}

	public function getAll()
	{
		$sql = "
		SELECT genre
		FROM genres
		ORDER BY genre 
		";

		$statement = static::$pdo->prepare($sql);
		$statement->execute();
		$genres = $statement->fetchAll(PDO::FETCH_OBJ);

		return $genres;

	}

	public function getGenreId($genreName)
	{
		$sql = "
		SELECT id
		FROM genres
		WHERE genre = ?
		LIMIT 1
		";
		$statement = static::$pdo->prepare($sql);
		$statement ->bindParam(1,$genreName);
		$statement->execute();
		$genreId = $statement->fetch(PDO::FETCH_OBJ);

		echo $genreId->id;
	}
}

?>