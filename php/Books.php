<?

include_once('Application.php');

class Books extends Application
{

    //sql queries
    private $sql = array(
        'allBooks' => "SELECT b.title, a.NAME AS author, group_concat(c.name SEPARATOR ',') AS category FROM books b
                       LEFT JOIN authors a ON a.id = b.author_id
                       LEFT JOIN books_categories bc ON bc.book_id = b.id
                       LEFT JOIN categories c ON c.id = bc.category_id
                       GROUP BY  b.title ",
        'booksByCategory' =>  "SELECT b.title, a.NAME AS author, group_concat(c.name SEPARATOR ',') AS category FROM books b
                       LEFT JOIN authors a ON a.id = b.author_id
                       LEFT JOIN books_categories bc ON bc.book_id = b.id
                       LEFT JOIN categories c ON c.id = bc.category_id
                       WHERE c.id = {id}
                       GROUP BY  b.title "
    );


    public function __construct()
    {
        parent::__construct();

        /*if($this->isDbConnectionLive()){
            echo 'db kapcsolat él';
        }else{
            echo 'db kapcsolat megszakadt';
        }*/
    }

    //get books
    public function getBooks()
    {
        $books = $this->getResultList($this->sql['allBooks']);
        return $books;
    }

    //books queried by category
    public function getBooksByCategory($categoryId)
    {
        if (!$this->isValidId($categoryId)) {
            return array();
        }

        $params = array(
            '{id}' => $categoryId
        );

        $books = $this->getResultList(strtr($this->sql['booksByCategory'], $params));
        return $books;
    }
}
