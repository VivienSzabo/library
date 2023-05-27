<?
include_once('php/Books.php');

$books = new Books();


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/responsive.css" />
  <link rel="stylesheet" href="css/style.css" />
  <title>Library Program</title>
</head>

<body>
  <header>
    <span>
      <img src="assets/icons8-menu-50.png" alt="menu" />
    </span>
    <h1>Library Program</h1>
  </header>
  <main>
    <div class="col-3" id="category">
      <header class="mb-10">
        <h2>Category</h2>
        <span class="float-right"><img src="assets/icons8-sort-left-50.png" alt="close" /></span>
      </header>
      <div>
        <label for="fantasy" onClick="location.href='category.php?cat=1'">
          <input type="checkbox" name="fantasy" />
          Fantasy</label><br />
        <label for="novel" onClick="location.href='category.php?cat=3'">
          <input type="checkbox" name="novel" />
          Novel</label><br />
        <label for="self-help" onClick="location.href='category.php?cat=2'">
          <input type="checkbox" name="self-help" />
          Self-help</label><br />
        <label for="drama" onClick="location.href='category.php?cat=4'">
          <input type="checkbox" name="drama" />
          Drama</label><br />
        <label for="crime" onClick="location.href='category.php?cat=5'">
          <input type="checkbox" name="crime" />
          Crime</label><br />
        <label for="mistery" onClick="location.href='category.php?cat=6'">
          <input type="checkbox" name="mistery" />
          Mistery</label>
        <hr />
        <a href="admin/login.html"><span><img src="assets/icons8-logout-52.png" alt="" />Log in</span></a>
      </div>
    </div>




    <div class="col-9" id="content">
      <header class="mb-20">
        <h2>List of Books</h2>
      </header>
      <div>
        <input type="search" name="search" class="mb-20" />
        <button>Search</button>
        <button>Cancel</button>



        <table cellspacing="0">
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
          </tr>


          <? foreach ($books->getBooks() as $key => $book) { ?>
            <tr>
              <td><?= $book['title'] ?></td>
              <td><?= $book['author'] ?></td>
              <td><?= $book['category'] ?></td>
            </tr>
          <? } ?>
        </table>
      </div>
    </div>
  </main>
</body>

</html>