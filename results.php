<?php
require_once "classes/Db.php";
require_once "classes/book.php";

$searchtype = null;
$searchterm = null;
if (isset($_POST['submit'])) {
    $searchtype = $_POST['searchtype'];
    $searchterm = $_POST['searchterm'];
    $searchterm = trim($searchterm);
    if (!$searchtype || !$searchterm) {
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Library</title>
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

<!-- Start your project here-->
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">
    <!-- Navbar brand -->
    <a class="navbar-brand" href="#">Search</a>
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
        <form class="form-inline" action="results.php" method="post">
            <select class="browser-default custom-select" name="searchtype">
                <option value="author" <?php if ($searchtype == "author") {
                    echo 'selected="selected"';
                } ?>>Author
                </option>
                <option value="title" <?php if ($searchtype == "title") {
                    echo 'selected="selected"';
                } ?>>Title
                </option>
                <option value="isbn" <?php if ($searchtype == "isbn") {
                    echo 'selected="selected"';
                } ?>>ISBN
                </option>
            </select>
            <div class="md-form my-0">
                <input required class="form-control mr-sm-2" name="searchterm" type="text" placeholder="Search"
                       value="<?php echo $searchterm; ?>"
                       aria-label="Search">
                <button class="btn btn-outline-white btn-md my-2 my-sm-0 ml-3" type="submit" name="submit">Search
                </button>

            </div>
        </form>
    </div>
    <!-- Collapsible content -->
</nav>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Author</th>
        <th scope="col">ISBN</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php

    $book = new book();
    $rows = $book->selectByCriteria($searchtype, $searchterm);
    if ($rows != null) {
    foreach ($rows

    as $row) {
    ?>
    <tr>
        <th scope="row"><?php echo $row['id']; ?></th>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['author']; ?></td>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['price']; ?></td>
    </tr>
    <tr>
        <?php }
        } ?>
    </tbody>
</table>


<!--/.Navbar-->
<!-- Start your project here-->

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
