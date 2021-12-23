<?php

class Commonquery_model extends Model{

    function __construct(){
        parent::__construct();
    }

    function getStatementNo(){
       return $this->db->getStatementNo();
    }

} 