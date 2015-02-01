<?php 

require_once __DIR__ . '/Database.php';

class Song extends Database {

	private $title;
	private $id;
	private $genre_id;
	private $price;

	public function __construct($title,$id,$genre_id,$price)
	{
		session_start();
		parent::__construct();
		$this->title = $title;
		$this->id = $id;
		$this->genre_id = $genre_id;
		$this->price = $price;

	}

	public function getAll()
	{

	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setArtistId($id)
	{
		$this->id = $id;
	}

	public function setGenreId($genre_id)
	{
		$this->genre_id = $genre_id;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}

	public function save()
	{
		$sql = "
		INSERT INTO songs(title, artist_id, genre_id, price)
		VALUES (?,?,?,?)
		";

		$statement = static::$pdo->prepare($sql);
		$statement->bindParam(1,$this->title);
		$statement->bindParam(2,$this->id);
		$statement->bindParam(3,$this->genre_id);
		$statement->bindParam(4,$this->price);
		$statement->execute();
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getId()
	{
		return $this->id;
	}












}
?>