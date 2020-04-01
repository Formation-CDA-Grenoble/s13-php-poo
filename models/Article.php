<?php

class Article {
    private $id;
    private $title;
    private $content;
    private $cover;
    private $category;
    private $createdAt;

    static private function createArticleFromData($data): Article {
        return new Article(
            $data['id'],
            $data['title'],
            $data['content'],
            $data['cover'],
            new Category(
                $data['category_id'],
                $data['category_name'],
                $data['category_description']
            ),
            new DateTime($data['created_at'])
        );
    }

    static public function findAll(): array {
        $database = Database::getInstance();

        $sql = '
        SELECT `article`.`id`, `article`.`title`, `article`.`content`, `article`.`cover`, `article`.`created_at`, `category`.`id` AS `category_id`, `category`.`name` AS `category_name`, `category`.`description` AS `category_description`
        FROM `article`
        JOIN `category` ON `category`.`id` = `article`.`category_id`
        ORDER BY `article`.`created_at` DESC
        ';

        $statement = $database->query($sql);

        $result = $statement->fetchAll();

        $result = array_map(
            'self::createArticleFromData',
            $result
        );

        return $result;
    }

    static public function findById(int $id): Article {
        $database = Database::getInstance();

        $sql = '
        SELECT `article`.`id`, `article`.`title`, `article`.`content`, `article`.`cover`, `article`.`created_at`, `category`.`id` AS `category_id`, `category`.`name` AS `category_name`, `category`.`description` AS `category_description`
        FROM `article`
        JOIN `category` ON `category`.`id` = `article`.`category_id`
        WHERE `article`.`id` = :id
        ';

        $statement = $database->prepare($sql);

        $statement->execute([ 'id' => $id ]);

        $result = $statement->fetchAll();

        $result = self::createArticleFromData($result[0]);

        return $result;
    }

    public function save(): Article {
        if (is_null($this->id)) {
            return $this->create();
        }
        return $this->update();
    }

    public function create(): Article {
        $database = Database::getInstance();

        $sql = '
        INSERT INTO `article` (`title`, `content`, `cover`, `created_at`, `category_id`)
        VALUES (:title, :content, :cover, :createdAt, :categoryId)
        ';

        $database->prepare($sql)->execute([
            'title' => $this->title,
            'content' => $this->content,
            'cover' => $this->cover,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'categoryId' => $this->category->getId()
        ]);

        return $this;
    }

    public function update(): Article {
        $database = Database::getInstance();

        $sql = '
        UPDATE `article`
        SET `title` = :title, `content` = :content, `cover` = :cover, `created_at` = :createdAt, `category_id` = :categoryId
        WHERE `id` = :id
        ';

        $statement = $database->prepare($sql);

        $result = $statement->execute([
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'cover' => $this->cover,
            'createdAt' => $this->createdAt->format('Y-m-d H:i:s'),
            'categoryId' => $this->category->getId()
        ]);

        if ($result === false) {
            throw new RuntimeException('SQL error while saving Article #' . $this->id);
        }
        
        return $this;
    }

    public function delete(): void {
        $database = Database::getInstance();

        $sql = '
        DELETE FROM `article`
        WHERE `id` = :id
        ';

        $statement = $database->prepare($sql);

        $statement->execute([ 'id' => $this->id ]);
    }

    public function __construct(
        ?int $id = null,
        string $title = '',
        string $content = '',
        string $cover = '',
        Category $category = null,
        DateTime $createdAt = null
    ) {
        $this->id = $id;

        $this
            ->setTitle($title)
            ->setContent($content)
            ->setCover($cover)
            ->setCategory($category)
        ;

        if (is_null($createdAt)) {
            $this->setCreatedAt(new DateTime());
        } else {
            $this->setCreatedAt($createdAt);
        }
    }

    /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle(string $title): Article
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent(string $content): Article
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of cover
     */ 
    public function getCover(): string
    {
        return $this->cover;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */ 
    public function setCover(string $cover): Article
    {
        if (!empty($cover) && !filter_var($cover, FILTER_VALIDATE_URL)) {
            throw new RuntimeException('Property Article#cover must be a valid url ("' . $cover . '" given).');
        }

        $this->cover = $cover;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory(?Category $category): Article
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get the value of createdAt
     */ 
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */ 
    public function setCreatedAt(DateTime $createdAt): Article
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
