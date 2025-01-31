<?php 

$page = $_GET['page'] ?? 'home';

function nav_item($url, $title) {
    global $page;
    $active = ($page == $url) ? 'active' : '';
    return 
    "<li class='nav-item'>
        <a class='nav-link $active' href='./index.php?page=$url'>$title</a>
    </li>";
}


function css_link(string $filename):void{
    echo "<link rel='stylesheet' href='$filename'>";
}


?>