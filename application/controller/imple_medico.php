 <?php

/**
 * Class Control
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Imple_medico extends Controller
{
    /**
     * PAGE: index
     * This method handles the error page that will be shown when a page is not found
     */
    public function index()
    {
        // load views
        require APP . 'view/_templates/imple_header.php';
        require APP . 'view/implementos/implemento_medico.php';
        require APP . 'view/_templates/footer.php';
    }
}