<?php
require_once "classes/Db.php";
require_once "classes/book.php";

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $isbn = $_POST['isbn'];
    $price = $_POST['price'];

    $fields = [
        'title' => $title,
        'author' => $author,
        'isbn' => $isbn,
        'price' => $price
    ];

    $book = new book();
    $book->insert($fields);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Add book</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Add book</a>
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
            aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">All books</a>
            </li>
        </ul>
        <!-- Links -->
<!--        <form class="form-inline" action="results.php" method="post">-->
<!--            <select class="browser-default custom-select" name="searchtype">-->
<!--                <option selected value="author">Author</option>-->
<!--                <option value="title">Title</option>-->
<!--                <option value="isbn">ISBN</option>-->
<!--            </select>-->
<!--            <div class="md-form my-0">-->
<!--                <input required class="form-control mr-sm-2" name="searchterm" type="text" placeholder="Search"-->
<!--                       aria-label="Search">-->
<!--                <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit">Search</button>-->
<!--            </div>-->
<!--        </form>-->
    </div>
    <!-- Collapsible content -->
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" required placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="author">Author</label>
                        <input type="text" class="form-control" name="author" required placeholder="Author">
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN (13-digit)</label>
                        <input type="text" pattern="[0-9]{13}" class="form-control" name="isbn" required
                               placeholder="ISBN">
                    </div>
                    <div class="form-group">
                        <label for="isbn">Price</label>
                        <input type="number" min="0" step="0.01" class="form-control" name="price" placeholder="0.00">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>


<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.4.1.min.js">
</script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>