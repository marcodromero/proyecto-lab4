<?php

// controllers/Index.php

require '../fw/fw.php';
require '../views/Login.php';




$v = new Login();
$v->render();