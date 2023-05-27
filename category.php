<?
include_once('php/Books.php');

$books = new Books();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/responsive.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Category</title>
</head>

<body>
    <div id="content" class="col-9">
        <header class="mb-20">
            <h2>Categorized list of books</h2>
        </header>


        <div>

            <table cellspacing="0">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Category</th>
                </tr>


                <? foreach ($books->getBooksByCategory(intval($_GET['cat'])) as $key => $book) { ?>
                    <tr>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['category'] ?></td>
                    </tr>
                <? } ?>
            </table>
        </div>
    </div>
</body>

</html>