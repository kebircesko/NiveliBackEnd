<?php
require_once __DIR__.'/includes/functions.php';
unset($_SESSION['user']); session_regenerate_id(true); flash('success','Dolët nga llogaria.'); redirect('index.php');
