<?php
$x = array(__DIR__. '/modules/', __DIR__. '/controllers/', __DIR__. '/views/');
foreach ($x as $key => $path){
    foreach (scandir($path) as $key => $file) {
        if ('.' !== $file && '..' !== $file){
            require_once $path . $file;
        }
    }
}