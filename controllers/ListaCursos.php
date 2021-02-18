<?php

// controllers/ListaCursos.php

require '../fw/fw.php';
require '../models/Cursos.php';
require '../views/ListaCursos.php';

$e = new Cursos();
$todos = $e->getTodos();


$v = new ListaCursos();
$v->cursos = $todos;

$v->render();