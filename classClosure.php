<?php 
    //Closure is an object
    // $message = "Process cannot be completed because of errors! <br/>";
    // $check = function( array $errors ) use ( $message ) {
    //     if( isset( $errors ) && count( $errors ) > 0 ) {
    //         echo $message;
    //         foreach( $errors as $error ) {
    //             echo "$error <br/>";
    //         }
    //     }
    // };

    // echo "<pre>";
    // print_r( $check );
    // echo "</pre>";

    //usage of the bindTo() method
    class View
    {
        protected $pages = [];
        protected $title = "Contacts";
        protected $body = "Content of the Contact page";

        public function addPage( $page, $pageCallback )
        {
            $this->pages[$page] = $pageCallback->bindTo( $this, __CLASS__ );
        }

        public function render( $page )
        {
            $this->pages[$page]();
            $content = <<<HTML
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>{$this->title()}</title>
                <meta charset="utf-8">
            </head>
            <body>
                <p>{$this->body()}</p>
            <body>
        </html>
HTML;
            echo $content;

        }

        public function title()
        {
            return htmlspecialchars( $this->title );
        }

        public function body()
        {
            return nl2br( htmlspecialchars( $this->body ) );
        }
    }

    $view = new View();
    $view->addPage( 'about', function() 
    {
        $this->title = 'About us';
        $this->body = 'Content of the About us page';
    });
    $view->render('about');

?>