<?php

class Article {
    private $id;
    private $title;
    private $content;
    private $cover;
    private $category;

    public function __construct(
        $title = '',
        $content = '',
        $cover = '',
        $category = ''
    ) {
        $this->title = $title;
        $this->content = $content;
        $this->cover = $cover;
        $this->category = $category;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of cover
     */ 
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set the value of cover
     *
     * @return  self
     */ 
    public function setCover($cover)
    {
        if (!filter_var($cover, FILTER_VALIDATE_URL)) {
            throw new RuntimeException('Property Article#cover must be a valid url ("' . $cover . '" given).');
        }

        $this->cover = $cover;

        return $this;
    }

    /**
     * Get the value of category
     */ 
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set the value of category
     *
     * @return  self
     */ 
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }
}

// Crée un article à l'aide de son constructeur
$myArticle = new Article(
    'My first article',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.',
    'http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg',
    'News'
);

// Crée un article à l'aide des setters
$myArticle = new Article();

$myArticle
    ->setTitle('My first article')
    ->setContent('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.')
    ->setCover('http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg')
    ->setCategory('News');

var_dump($myArticle);
