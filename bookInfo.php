<?php
require_once "DBStorage.php";
$storage = new DBStorage();

$id = $_GET['id'];
$book = $storage->getBook($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookkStore</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="styleMain.css">
</head>
<body>
<div class="myContainer">
    <header>
        <a href="mainPage.html">
            <img src="images/knihy.png" alt="Logo of the store" class="myLogo">
        </a>
        <div class="addNewBookButton">
            <a href="addBook.php">Add new book</a>
        </div>
        <nav>
            <div>
                <!-- <img src="images/ham.svg" alt="Toggle menu" class="menu"> -->

                <div class="btn-group dropleft mobileMenu">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="images/ham.svg" alt="Toggle menu" class="menuImgMobile">
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="mainPage.html">Home</a>
                        <a class="dropdown-item" href="login.html">Sign In</a>
                        <a class="dropdown-item" href="#">About</a>
                        <a class="dropdown-item" href="list.php">List of Books</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="druha.html">Gallery</a>
                    </div>
                </div>

                <ul class="desktopMenu inline">
                    <li><a href="mainPage.html">Home</a></li>
                    <li><a href="login.html">Sign In</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="list.php">List of Books</a></li>
                    <li><a href="druha.html">Gallery</a></li>
                </ul>
            </div>
        </nav>

    </header>

    <div class="bookInfo">
        <div class="book">
            <img src="data:image/png/jpg/jpeg;base64,<?= $book->getImage() ?>" alt="Image of book cover"
                 class=bookInfoCover>
            <div class="descBookInfo">
                <h4><b class="nameOfTheBook"><?=$book->getBookName()?></b></h4>
                <p><?=$book->getDescription()?></p>
            </div>
            <div class="editInfoBookButton">
                <a href="editBook.php?id=<?=$book->getId()?>">Edit book</a>
            </div>
        </div>


    </div>

</div>
</body>
</html>
