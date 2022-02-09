<?php

/**
 * @param string $template
 * @param array $data
 * @return string
 */
function renderTemplate($template, $data = []) {
    ob_start();
    include $template;
    return ob_get_clean();
}

/**
 * @param string $path
 * @return string
 */
function getFullPath($path = '/') {
    return PROJECT_ROOT . '/' . trim($path, '/');
}

function getTemplatePathFromUrl() {
    return trim($_SERVER['REQUEST_URI'], '/');
}

function getTemplateTitleFromUrl() {
    $template = getTemplatePathFromUrl();
    if (!$template) {
        $template = 'home_page';
    }
    return ucwords(
        str_replace(
            '_',
            ' ',
            str_replace(
                '/',
                ' | ',
                $template
            )
        )
    );
}

function getTemplateContentFromUrl() {
    $template = getTemplatePathFromUrl();
    if (!$template) {
        $template = '_';
    }
    $filePath = getFullPath('src/' . $template);
    if (file_exists($filePath . '.phtml')) {
        $file = $filePath . '.phtml';
        return renderTemplate($file);
    } else {
        return renderTemplate(getFullPath('src/404.phtml'));
    }
}
