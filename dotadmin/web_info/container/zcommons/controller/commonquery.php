<?php

class Commonquery extends Controller{

    function __construct(){
        parent::__construct();
    }

    function init(){
        $this->getstno();
    }

    function getstno(){
       echo $this->model->getStatementNo();
    }

} 