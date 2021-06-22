<?php
/**
 * Class Loader
 */
    foreach (glob(__DIR__."/../app/Config/*.php") as $filename)
    {
        require __DIR__."/../app/Config/".basename($filename);
    }

    require __DIR__."/Midleware/Database.php";
    require __DIR__."/Midleware/Core.php";
    require __DIR__."/Midleware/Authenticate.php";
    require __DIR__."/Midleware/User.php";
    require __DIR__."/Midleware/DatabaseActions.php";
    require __DIR__."/Libs/template_class/BladeOne/vendor/autoload.php";

    require __DIR__."/Midleware/RenderEngine.php";
    require __DIR__."/Libs/formBuilder/vendor/autoload.php";
    require __DIR__."/Libs/rss_feed/vendor/autoload.php";
    require __DIR__."/Libs/MusicEngineAPIClient/API.php";
    require __DIR__."/Libs/LastFm/vendor/autoload.php";

    require __DIR__."/Kernel/Router.php";
    require __DIR__."/Kernel/Controller.php";
    require __DIR__."/Kernel/Model.php";
    require __DIR__."/Kernel/View.php";
    require __DIR__."/Kernel/Error.php";

        foreach (glob(__DIR__."/../app/Controller/*.php") as $filename)
        {
            require __DIR__."/../app/Controller/".basename($filename);
        }
        foreach (glob(__DIR__."/../app/Model/*.php") as $filename)
        {
            require __DIR__."/../app/Model/".basename($filename);
        }


    /**
     * Loader END
     */


?>