<?php

function connect(){
        $mysqli = new mysqli("localhost","root","flacucho14","mydb");
        if ($mysqli->connect_errno !=0) {
            return $mysqli->connect_error;
        }else{
            return $mysqli;
        }
    }

    