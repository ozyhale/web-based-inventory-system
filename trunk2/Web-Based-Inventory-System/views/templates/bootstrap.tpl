<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{$page_name} - Web Based Inventory System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="{$host}/public/css/bootstrap.css">
        <link rel="stylesheet" href="{$host}/public/css/font-awesome.min.css">
        <link rel="stylesheet" href="{$host}/public/css/bootstrap-responsive.css">
        <link rel="stylesheet" href="{$host}/public/select2/select2.css">
        <link rel="stylesheet" href="{$host}/public/css/main.css">

        <style type="text/css">
            body{
                padding-top: 15px;
                background-color: #cecece;
            }
        </style>

        <script src="{$host}/public/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="container socs-content">

            <div class="row">
                <div class="span12">

                    {if isset($user_exist)}
                        <small class="pull-right">{$name}(<a href="{$host}/index.php?action=logout">logout</a>)</small>
                    {/if}

                    <p class="lead">2D's Sari-sari Store Inventory System</p>

                </div>
            </div>

            {include file=$content}

            <hr>

            <footer>
                <p>&copy; 2D's Sari-sari Store Inventory System 2013</p>
            </footer>

        </div>

        {if $alert != ""}
            <div id="wbis-alert" class="modal fade hide">
                <div class="modal-body">
                    {$alert}
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">OK</button>
                </div>
            </div>
        {/if}

        {*
        {if isset($pre_product_name)}
            <div id="edit-product-modal" class="modal fade hide">
                <form class="form-horizontal" method="post">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal"><i class="icon-remove"></i></button>
                        <p class="lead">Edit Product</p>
                    </div>
                    <div class="modal-body">

                        <div class="control-group">
                            <label class="control-label">Product Name: </label>
                            <div class="controls">
                                <input type="text" name="product" value="{$pre_product_name}">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Category Name: </label>
                            <div class="controls">
                                <select name="category" required>
                                    {foreach from=$array_category_name1 key=k item=i}
                                        <option value="{$array_category_id1[$k]}" {if $pre_category_name eq $i} selected {/if} >{$i}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label">Quantity: </label>
                            <div class="controls">
                                <input type="text" name="quantity" value="{$pre_quantity}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" type="submit" name="edit_product" value="save">
                            <i class="icon-save"></i> Save
                        </button>
                        <button class="btn" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        {/if}
        *}

        <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>-->
        <!--<script>window.jQuery || document.write('<script src="{$host}/js/vendor/jquery-1.8.3.min.js"><\/script>')</script>-->

        <script src="{$host}/public/js/vendor/jquery-1.8.3.min.js"></script>
        <script src="{$host}/public/js/vendor/bootstrap.min.js"></script>
        <script src="{$host}/public/js/vendor/bootbox.min.js"></script>
        <script src="{$host}/public/select2/select2.js"></script>

        {*
        {if isset($pre_product_name)}
            {literal}
                <script type="text/javascript">
                    $(document).ready(function() {

                        $('#edit-product-modal').modal('show');

                    })
                </script>
            {/literal}
        {/if}
        *}

        <script src="{$host}/public/js/main.js"></script>

    </body>
</html>
