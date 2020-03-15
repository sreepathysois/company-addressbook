<?php

require './views/BaseView.php';

    class BaseController{

        function __construct()
        {
            $this->view = new BaseView();
            $this->view->render('test');
        }

    }
