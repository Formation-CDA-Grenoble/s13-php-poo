<?php

class ArticleController {
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

    public function render(string $templateName, array $params = []): void {
        foreach ($params as $propName => $value) {
            $$propName = $value;
        }

        include './views/header.tpl.php';
        include './views/' . $templateName . '.tpl.php';
        include './views/footer.tpl.php';
    }
}
