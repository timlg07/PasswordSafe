<?php

    class Database 
    {
        public $file = "";
        public $data = [];
        
        public function __construct( $fileName = "database.txt" )
        {
            $this->file = $fileName;
            
            if( !is_file($this->file) ){
                $this->save();
            }
        }
        
        public function read()
        {
            $this->data = unserialize( file_get_contents( $this->file ));
        }
        
        public function save()
        {
            file_put_contents( $this->file , serialize( $this->data ));
        }
    }

?>