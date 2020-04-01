<?php

require_once '../services/Database.php';

class Category {
    private $id;
    private $name;
    private $description;
    private $articles;

    public function __construct(
        int $id = null,
        string $name = '',
        string $description = ''
    ) {
        $this->id = $id;

        $this
            ->setName($name)
            ->setDescription($description)
        ;

        $this->articles = [];
    }

    static public function createCategoryFromData(array $data): Category {
        return new Category(
            $data['id'],
            $data['name'],
            $data['description']
        );
    }

    static public function findAll(): array {
        $database = Database::getInstance();

        $sql = '
        SELECT * FROM `category`
        ';

        $statement = $database->query($sql);

        $result = $statement->fetchAll();

        $result = array_map(
            'self::createCategoryFromData',
            $result
        );

        return $result;
    }

    static public function findById(int $id): Category {
        $database = Database::getInstance();

        $sql = '
        SELECT * FROM `category`
        WHERE `id` = :id
        ';

        $statement = $database->prepare($sql);

        $statement->execute([ 'id' => $id ]);

        $result = $statement->fetchAll();

        $result = self::createCategoryFromData($result[0]);

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    
    /**
     * Get the value of articles
     */ 
    public function getArticles(): array
    {
        return $this->articles;
    }

    public function addArticle(Article $article): Category {
        array_push($this->articles, $article);

        return $this;
    }

    public function removeArticle(Article $article): Category {
        $index = array_search($article, $this->articles);

        if ($index === false) {
            throw new RunTimeException('Cannot remove article named "' . $article->getName() . '" from category named "' . $this->getName() . '".');
        }

        array_splice($this->articles, $index, 1);

        return $this;
    }
}
