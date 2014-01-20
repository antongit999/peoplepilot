<?php

Router::parseExtensions("json", "html");

Router::connect('/', array('controller' => 'users', 'action' => 'login', 'admin' => true));
Router::connect('/admin', array('controller' => 'pages', 'action' => 'home', 'admin' => true));
