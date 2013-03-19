<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{$page_name} - Student Online Clearance System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{$host}/public/css/bootstrap.min.css">
        <link rel="stylesheet" href="{$host}/public/css/font-awesome.min.css">
        {literal}
            <style>
                body {{/literal}
                    padding-top: 45px;
                    padding-bottom: 40px;                    
                    background-image: url('{$host}/public/img/background.png');
                    background-attachment: fixed;
                    background-position: top;
                    background-repeat: repeat-x;
                }{literal}

                #header{{/literal}
                    background-image: url('{$host}/public/img/header.png');
                    background-position: right;
                    background-repeat: no-repeat;
                }{literal}

                #welcome{{/literal}
                    background: url('{$host}/public/img/title.png');
                    background-position: bottom right;
                    background-repeat: no-repeat;
                }{literal}

                .socs-welcome{
                    background-color: transparent; 
                    padding-bottom: 245px;
                    padding-left: 75px;
                    text-shadow: inherit;
                }

                .carousel-caption h1,
                .carousel-caption .lead {
                    margin: 0;
                    line-height: 1.25;
                    color: #fff;
                    text-shadow: 0 1px 1px rgba(0,0,0,.4);
                }

                .carousel-caption .btn {
                    margin-top: 10px;
                }

                .carousel-images, .carousel-size{
                    width: 1200px; 
                    height:500px;
                }
                /*
                div{
                border: 1px #000 solid;
                }*/
            </style>
        {/literal}
        <link rel="stylesheet" href="{$host}/public/css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="{$host}/public/css/main.css">

        <script src="{$host}/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        <script src="{$host}/public/js/calendarview.js"></script>
        <script src="{$host}/public/js/prototype.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        
        
        <div class="container socs-content">

            
            {if isset($user_exist)}<div class="pull-right"><h5>{$name}(<a href="{$host}/index.php?action=logout">logout</a>)</h5></div>{/if}
            <br/><br/>   
            
            {$alert}
            {include file=$content}

            <hr>

            <footer>
                <p>&copy; Student Online Clearance System 2012</p>
            </footer>

        </div>
        {*
        <div class="span10 offset1">

        {if isset($username)}
        <div id="header" class="row socs-content">
        <div class="span1">

        {if isset($photo)}
        <img src="{$photo}" class="img-polaroid" />
        {else}
        <img src="{$host}/photos/default.png" class="img-polaroid" />
        {/if}

        </div>
        <div class="span5">
        <h4>{$surname}, {$firstname} {$middlename}</h4>
        <h5>- {$account_type} {$assign_sign}</h5>
        </div>
        </div>
        {/if}

        <div class="row socs-content">

        {$alert}

        {include file='UIsections.tpl'}
        {include file=$content}

        <hr>

        <footer>
        <p>&copy; Student Online Clearance System 2012</p>
        </footer>

        </div>
        </div>
        *}
        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="{$host}/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>-->

        <script src="{$host}/public/js/vendor/jquery-1.8.3.min.js"></script>
        <script src="{$host}/public/js/vendor/bootstrap.min.js"></script>
        <script src="{$host}/public/js/vendor/bootbox.min.js"></script>

        <script src="{$host}/public/js/main.js"></script>

        {*
        {literal}
        <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        {/literal}
        *}
    </body>
</html>
