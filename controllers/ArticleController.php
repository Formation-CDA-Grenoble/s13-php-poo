<?php

class ArticleController {
    public function list(): void {
        $this->show('article-list', [
            'articles' => Article::findAll()
        ]);
    }

    public function show(string $templateName, array $params = []): void {
        foreach ($params as $propName => $value) {
            $$propName = $value;
        }

        include './views/header.tpl.php';
        include './views/' . $templateName . '.tpl.php';
        include './views/footer.tpl.php';
    }
}
