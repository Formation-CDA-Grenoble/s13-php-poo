<?php

require_once 'Category.php';

class Article {
    private $id;
    private $title;
    private $content;
    private $cover;
    private $category;
    private $createdAt;

    public function __construct(
        string $title = '',
        string $content = '',
        string $cover = '',
        Category $category = null,
        DateTime $createdAt = null
    ) {
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
