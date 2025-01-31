<?php 


    class Autoload{
        public static function register()
        {
            spl_autoload_register([__CLASS__, "autoload"]);
        }

        public static function autoload($classes)
        {
            $classes = str_replace(__NAMESPACE__."\\", "", $classes);
            $classes = str_replace("\\", "/", $classes);
            require __DIR__."/".$classes.".php";
        }
    }


?>