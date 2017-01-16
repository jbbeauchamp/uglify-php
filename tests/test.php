<?php

use UglifyPHP\JS;
use UglifyPHP\CSS;
use UglifyPHP\HTML;

require_once __DIR__ . '/../vendor/autoload.php';

if (JS::installed()) {
    $uglify = new JS(array('js-files/jquery.js', 'js-files/bootstrap.js', 'js-files/script.js'));

    if ($uglify->minify('min.js')) {
        echo '<p>JS compressed</p>';
    } else {
        echo '<p>JS error</p>';
    }
}

if (CSS::installed()) {
    $uglify = new CSS(array('css-files/bootstrap-responsive.css', 'css-files/bootstrap.css', 'css-files/css.css'));

    if ($uglify->minify('min.css', array('max-line-len' => '80'))) {
        echo '<p>CSS compressed</p>';
    } else {
        echo '<p>CSS error</p>';
    }
}

if (HTML::installed()) {
    $uglify = new HTML(array('html-files/index.html'));
    $compressedHtmlString = $uglify->minify(null, [
        'collapse-boolean-attributes' => true,
        'collapse-inline-tag-whitespace' => true,
        'collapse-whitespace' => true,
        'decode-entities' => true,
        'include-auto-generated-tags' => true,
        'remove-attribute-quotes' => true,
        'remove-comments' => true,
        'remove-optional-tags' => true,
        'remove-redundant-attributes' => true,
        'remove-script-type-attributes' => true,
        'remove-empty-attributes' => true,
        'sort-attributes' => true,
        'sort-class-name' => true,
        'use-short-doctype' => true,
        'minify-js' => true,
        'minify-css' => true,
        'trim-custom-fragments' => true,
    ]);
    if ($compressedHtmlString) {
        echo $compressedHtmlString;
    } else {
        echo '<p>HTML error</p>';
    }
}
