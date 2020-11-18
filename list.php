<?php
require_once "DBStorage.php";
$storage = new DBStorage();

$books = $storage->getAll();

if (isset($_POST['deleteField'])) {
    if (isset($_POST['deleteId'])) {
        $storage->deleteBook($_POST['deleteId']);
        header('Refresh: 0');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BookkStore</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
                      <div class="btn-group dropleft mobileMenu">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

    <!--
    <div class="listContainer">
        <div class="book">
            <a href="https://www.google.com/">
                <img src="images/blankBook.jpg" alt="Image of book cover" class = bookCover>
            </a>
            <div class="descBook"><h4>
                    <b class="nameOfTheBook">Title 1</b></h4>
                    <p>Text to the book Text to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the bookText to the book</p>
            </div>
        </div>


    </div>
    -->


        <div class="listContainer">
            <?php foreach ($books as $book) { ?>
            <div class="book">
                <a href="bookInfo.php?id=<?=$book->getId()?>">
                    <img src="data:image/png/jpg/jpeg;base64,<?=$book->getImage() ?> " alt="" class="listBookCover">
                </a>
                <div class="descBook">
                    <h4><b class="nameOfTheBook"><?=$book->getBookName()?></b></h4>
                    <p><?=$book->getDescription()?></p>
                    <form method="post" class="deleteBook">
                        <input type="hidden" value="<?=$book->getId()?>" name="deleteId">
                        <button type="submit" name="deleteField"><span class="glyphicon glyphicon-trash"></span></button>

                    </form>
                </div>
            </div>
            <?php } ?>
        </div>



</div>
</body>
</html>