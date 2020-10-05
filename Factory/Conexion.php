<?php

class Conexion {

    public function ConectarBD() {
        $conex = mysqli_connect("localhost", "root", "farmacia", "farmacia");
        return $conex;
    }

}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

