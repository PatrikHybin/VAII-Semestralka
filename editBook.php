<?php
require_once "DBStorage.php";
$storage = new DBStorage();

$id = $_GET['id'];
$book = $storage->getBook($id);

if (isset($_POST['bookName'],$_POST['description'])){
    if (!empty($_FILES['image']['name'])) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $storage->updateBook($_POST['bookName'],$_POST['description'],$imageData, $book->getId());
    } else {
        $storage->updateBook($_POST['bookName'],$_POST['description'],$book->getImage(), $book->getId());
    }
}

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
<header>
    <a href="mainPage.html">
        <img src="images/knihy.png" alt="Logo of the store" class="myLogo">
    </a>
    <nav>
        <div>
            <!-- <img src="images/ham.svg" alt="Toggle menu" class="menu"> -->

            <div class="btn-group dropleft mobileMenu">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <img src="images/ham.svg" alt="Toggle menu" class="menuImgMobile">
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="list.php">List of Books</a>
                </div>
            </div>
            <ul class="desktopMenu inline">
                <li><a href="list.php">List of Books</a></li>
            </ul>
        </div>
    </nav>

</header>

<div class="addNewBook">
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Book Name</label>
            <input type="text" name="bookName" value="<?=$book->getBookName()?>">
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="3"><?=$book->getDescription()?></textarea>
        </div>

        <div class="form-group">
            <label>Input file from PC</label>
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit">
        </div>

    </form>
</div>

</body>
</html>

