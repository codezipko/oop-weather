<?php

function view($name, $data = []) {
    extract($data);
    return ['template' => $name.'.twig', 'context' => $data];
}