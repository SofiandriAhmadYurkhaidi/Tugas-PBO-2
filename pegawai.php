<?php


class Pegawai{
    
    function getAll($conn,$query){
        $data = mysqli_query($conn,$query);
        return $data;
    }
    

}