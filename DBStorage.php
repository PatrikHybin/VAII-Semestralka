<?php
require_once "Book.php";

class DBStorage
{
    private $user = "root";
    private $pass = "dtb456";
    private $db = "semestralka";
    private $host = "localhost";

    private PDO $pdo;

    /**
     * DBStorage constructor.
     */
    public function __construct()
    {
        $this->pdo = new PDO("mysql:dbname={$this->db};host={$this->host}",$this->user, $this->pass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }


    public function getAll() : array {
        $stmt = $this->pdo->query("SELECT * FROM book");
        $books=[];
        while ($row = $stmt->fetch()) {
            $book = new Book($row['bookName'], $row['description'],''.base64_encode($row['image']));
            $book->setId($row['id']);
            $books[] = $book;
        }
        return $books;
    }

    public function getBook(int $id) : Book {
        $stmt = $this->pdo->query("SELECT * FROM book where $id = book.id");
        $row = $stmt->fetch();
        $book = new Book($row['bookName'], $row['description'],''.base64_encode($row['image']));
        $book->setId($row['id']);
        return $book;
    }

    public function updateBook($bookName, $description, $image, $id) : void {
        $stmt = $this->pdo->prepare("UPDATE book SET book.bookName=?, book.description=?, book.image=? where book.id=?");
        $stmt->execute([$bookName, $description, $image, $id]);

    }


    public function deleteBook(int $id) : void {
        $this->pdo->query("DELETE FROM book where $id = book.id");
    }

    public function saveBook(Book $book): void {
        $stmt = $this->pdo->prepare("INSERT INTO book (bookName, description, image) VALUES (?, ?, ?)");
        $stmt->execute([$book->getBookName(), $book->getDescription(), $book->getImage()]);
    }

    public function createBook($bookName, $description, $image) : void
    {
        $book = new Book($bookName, $description, $image);
        $this->saveBook($book);
    }

}