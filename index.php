<?php
   require_once 'core/core_router.php';

   $router = new Router();
   $router->dispatch($_SERVER['REQUEST_URI']);
?>