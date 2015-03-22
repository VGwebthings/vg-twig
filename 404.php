<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <title>Error 404</title>
    <meta name="description" content="<?php _e( 'File not found', 'vg' ); ?>">
    <link rel="stylesheet" href="http://s3-eu-west-1.amazonaws.com/fortrabbit-static/css/fortrabbit.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <style>
        body.usernavhidden{
            background-color:#e1e1e1;
        }
        .content{
            background-color:#e1e1e1;
        }
        h1, h2, h3, h4, h5{
            border-bottom:4px solid #0098ed;
        }
        article ul li:before{
            color:#0098ed;
        }
        footer{
            border-top:8px double #0098ed;
        }
        p a, li a, dl a, h1 a, h2 a, h3 a, h4 a, td a, blockquote a{
            box-shadow:0 1px #0098ed;
        }
        p a:hover, li a:hover, dl a:hover, h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, td a:hover, blockquote a:hover, p a:visited:hover, li a:visited:hover, dl a:visited:hover, h1 a:visited:hover, h2 a:visited:hover, h3 a:visited:hover, h4 a:visited:hover, td a:visited:hover, blockquote a:visited:hover{
            box-shadow:0 2px #0098ed;
        }
        article p, article dl, article ol, article ul, article hr{
            max-width:none;
        }
    </style>
</head>
<body class="usernavhidden">
<div id="main" role="main" class="content">
    <main role="main" class="flexcenter mainframe">
        <article class="wrapper wide">
            <h1>Error 404 <br><span class="thinfont"><?php _e( 'File not found', 'vg' ); ?></span></h1>

            <div>
                <ul>
                    <li><?php _e( 'A search engine directs to a deleted page.', 'vg' ); ?></li>
                    <li><?php _e( 'This page has been moved during an update.', 'vg' ); ?></li>
                    <li><?php _e( 'There is a typo in the address bar (URL).', 'vg' ); ?></li>
                    <li><?php _e( 'Something else. Please check the <a href="https://twitter.com/VGwtHealth">VG services health</a>.', 'vg' ); ?></li>
                </ul>
            </div>
        </article>
    </main>
</div>
</body>
</html>
