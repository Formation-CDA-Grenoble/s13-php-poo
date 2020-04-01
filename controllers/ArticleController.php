<?php

class ArticleController extends AbstractController {
    public function list(): void {
        $this->render('article-list', [
            'articles' => Article::findAll()
        ]);
    }

    public function show(int $id): void {
        $this->render('article', [
            'article' => Article::findById($id)
        ]);
    }

    public function new(): void {
        $this->render('article-edit', [
            'categories' => Category::findAll()
        ]);
    }

    public function edit(int $id): void {
        $this->render('article-edit', [
            'categories' => Category::findAll(),
            'article' => Article::findById($id)
        ]);
    }

    public function create(): void {
        $article = new Article(
            null,
            $_POST['title'],
            $_POST['content'],
            $_POST['cover'],
            Category::findById($_POST['category'])
        );
        
        $article->save();

        $this->list();
    }

    public function update(int $id): void {
        $article = Article::findById($id);

        $article
            ->setTitle($_POST['title'])
            ->setContent($_POST['content'])
            ->setCover($_POST['cover'])
            ->setCategory(Category::findById($_POST['category']))
        ;
        
        $article->save();

        $this->list();
    }

    public function delete(int $id): void {
        $article = Article::findById($id);

        $article->delete();

        $this->list();
    }
}
