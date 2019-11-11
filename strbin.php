<?php
    
    class StrBinConverter
    {
        public static function str2bin( $string )
        {
            $bin = [];            
            // reduce function calls
            $len = strlen( $string );
            // iterate the bytes of the string
            for( $i=0; $i<$len; $i++ ){
                // convert to binary and add to array
                array_push( $bin, decbin(ord( $string[$i] )) );
            }
            return $bin;
        }
    }

?>