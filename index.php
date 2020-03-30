<?php

class Article {
    public $id;
    public $title;
    public $content;
    public $cover;
    public $category;

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
}

$myArticle = new Article(
    'My first article',
    'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti obcaecati quibusdam asperiores soluta dolore. Provident similique obcaecati minus qui natus officia et! Unde similique assumenda mollitia sunt voluptas cum, quae officiis? Nisi mollitia nulla aliquid, unde impedit, labore quibusdam maiores quidem, et velit blanditiis? Magni exercitationem rem asperiores sint cum.',
    'http://imgs.abduzeedo.com/files/francois/wallpapers/wpw408/abdz_infrared_arashiyama_mockup.jpg',
    'News'
);

$myOtherArticle = new Article(
    'My other article',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem iure sequi adipisci perferendis maxime quam ullam ut quia maiores totam ipsum esse pariatur cupiditate, veniam laudantium? Mollitia excepturi minima tempora culpa perferendis, pariatur consequuntur explicabo voluptate ratione inventore nihil ipsa amet placeat in id? Quis aliquam accusantium quo cum provident!'
);

// var_dump($myOtherArticle);
