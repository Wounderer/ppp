<html lang="en"><head>
        <meta charset="utf-8">
        <title>Шиномонтаж в Зеленограде круглосуточно</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">    

        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/bootstrap-responsive.min.css" rel="stylesheet">

        <link href="../../css/ui-lightness/jquery-ui-1.10.3.custom.min.css" rel="stylesheet">

        <link href="../../css/base-admin-3.css" rel="stylesheet">
        <link href="../../css/base-admin-3-responsive.css" rel="stylesheet">

        <link href="../../css/pages/dashboard.css" rel="stylesheet">   

        <link href="../../css/custom.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style type="text/css"></style></head>

    <body>

        <nav class="navbar navbar-inverse" role="navigation">

            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="icon-cog"></i>
                    </button>
                    <a class="navbar-brand" href="../../index.php">Переобуй.рф - ассоциация шиномонтажей г. Зеленограда</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                        $user_obj = new user();
                        if ($user_obj->isLoaded()) {
                        ?>
                        <li class="dropdown">
                            <a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-user"></i> 
                                Личный кабинет
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($user_obj->user_point != null) { ?>
                                <li><a href="?page=pointadmin">Информация</a></li>
                                <?php
                                }
                                ?>
                                <li><a href="?page=userstat">Статистика</a></li>
                                <li class="divider"></li>
                                <li><a href="?page=logout">Выход</a></li>
                            </ul>
                        </li>
                        <?php } else {
                            ?>
                        <li>
                                <a href="?page=user">Вход / Регистрация</a>
                        </li>
                        <?php
                        }?>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div> <!-- /.container -->
        </nav>





        <div class="subnavbar">

            <div class="subnavbar-inner">

                <div class="container">

                    <a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="icon-reorder"></i>

                    </a>

                    <div class="collapse subnav-collapse">
                        <ul class="mainnav">

                            <li class="active">
                                <a href="../../index.php">
                                    <i class="icon-home"></i>
                                    <span>Главная</span>
                                </a>	    				
                            </li>

                            <li class="dropdown">					
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-th"></i>
                                    <span>Услуги</span>
                                    <b class="caret"></b>
                                </a>	    

                                <ul class="dropdown-menu">
                                    <li><a href="../../elements.html">Elements</a></li>
                                    <li><a href="../../forms.html">Form Styles</a></li>
                                    <li><a href="../../jqueryui.html">jQuery UI</a></li>
                                    <li><a href="../../charts.html">Charts</a></li>
                                    <li><a href="../../popups.html">Popups/Notifications</a></li>
                                </ul> 				
                            </li>

                            <li class="dropdown">					
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-copy"></i>
                                    <span>Сотрудничество</span>
                                    <b class="caret"></b>
                                </a>	    

                                <ul class="dropdown-menu">
                                    <li><a href="../../pricing.html">Pricing Plans</a></li>
                                    <li><a href="../../faq.html">FAQ's</a></li>
                                    <li><a href="../../gallery.html">Gallery</a></li>
                                    <li><a href="../../reports.html">Reports</a></li>
                                    <li><a href="../../account.html">User Account</a></li>
                                </ul> 				
                            </li>

                        </ul>
                    </div> <!-- /.subnav-collapse -->

                </div> <!-- /container -->

            </div> <!-- /subnavbar-inner -->

        </div> <!-- /subnavbar -->


        <div class="main">

            <div class="container">

                <?=$row?>
                <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /main -->



        <div class="extra">

            <div class="container">

                <div class="row">

                    <div class="col-md-3">

                        <h4>About</h4>

                        <ul>
                            <li><a href="javascript:;">About Us</a></li>
                            <li><a href="javascript:;">Twitter</a></li>
                            <li><a href="javascript:;">Facebook</a></li>
                            <li><a href="javascript:;">Google+</a></li>
                        </ul>

                    </div> <!-- /span3 -->

                    <div class="col-md-3">

                        <h4>Support</h4>

                        <ul>
                            <li><a href="javascript:;">Frequently Asked Questions</a></li>
                            <li><a href="javascript:;">Ask a Question</a></li>
                            <li><a href="javascript:;">Video Tutorial</a></li>
                            <li><a href="javascript:;">Feedback</a></li>
                        </ul>

                    </div> <!-- /span3 -->

                    <div class="col-md-3">

                        <h4>Legal</h4>

                        <ul>
                            <li><a href="javascript:;">License</a></li>
                            <li><a href="javascript:;">Terms of Use</a></li>
                            <li><a href="javascript:;">Privacy Policy</a></li>
                            <li><a href="javascript:;">Security</a></li>
                        </ul>

                    </div> <!-- /span3 -->

                    <div class="col-md-3">

                        <h4>Settings</h4>

                        <ul>
                            <li><a href="javascript:;">Consectetur adipisicing</a></li>
                            <li><a href="javascript:;">Eiusmod tempor </a></li>
                            <li><a href="javascript:;">Fugiat nulla pariatur</a></li>
                            <li><a href="javascript:;">Officia deserunt</a></li>
                        </ul>

                    </div> <!-- /span3 -->

                </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /extra -->




        <div class="footer">

            <div class="container">

                <div class="row">

                    <div id="footer-copyright" class="col-md-6">
                        © 2013 Переобуй.рф - ассоциация пунктов шиномонтажа в Зеленограде.
                    </div> <!-- /span6 -->


                </div> <!-- /row -->

            </div> <!-- /container -->

        </div> <!-- /footer -->





        
        <script src="../../js/libs/jquery-1.9.1.min.js"></script>
        <script src="../../js/libs/jquery-ui-1.10.0.custom.min.js"></script>
        <script src="../../js/libs/bootstrap.min.js"></script>

        <script src="../../js/Application.js"></script>
        <script>
            $(document).ready(function() {
                $('.tooltiped').tooltip({html:true});
            });
        </script>

        <a id="back-to-top" href="#top" style="display: none;">Наверх</a></body></html>