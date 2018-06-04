<?php
 class Conexao
{
   private $_host = 'www.db4free.net';
   private $_user = 'jogossistemas';
   private $_pass = '99510796';
   private $_database = 'jogossistemas';


   public  $_con;

   public function conectar()
   {
      
      $this->_con = mysqli_connect($this->_host,$this->_user,$this->_pass,$this->_database);
      if (!$this->_con) {
        echo "Conexão falhou";
      }

      return $this->_con ;
   }


}

?>