<?php


class Book
{
    private string $bookName;
    private string $description;
    private $image;
    private int $id;

    /**
     * Article constructor.
     * @param string $bookName
     * @param string $description
     */
    public function __construct(string $bookName, string $description, $image)
    {
        $this->bookName = $bookName;
        $this->description = $description;
        $this->image = $image;
    }



    /**
     * @return string
     */
    public function getBookName(): string
    {
        return $this->bookName;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


}