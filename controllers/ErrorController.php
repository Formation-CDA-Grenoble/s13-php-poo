<?php

class ErrorController extends AbstractController {
    public function notFound(): void {
        $this->render('not-found');
    }
}
