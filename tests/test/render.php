<?php

$luna = new luna();

$luna->page(__DIR__ . '/page.html')
     ->with([
        'title'       => "This is page title",
        'hello_world' => "Hello World",
        'description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s."
     ])
     ->render();