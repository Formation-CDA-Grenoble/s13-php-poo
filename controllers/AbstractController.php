<?php

abstract class AbstractController {
    public function render(string $templateName, array $params = []): void {
        foreach ($params as $propName => $value) {
            $$propName = $value;
        }

        include './views/header.tpl.php';
        include './views/' . $templateName . '.tpl.php';
        include './views/footer.tpl.php';
    }
}
