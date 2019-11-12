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
        
        public static function bin2str( $binaryArray )
        {
            $string = "";
            foreach( $binaryArray as $bin ){
                $string .= chr(bindec( $bin ));
            }
            return $string;
        }
        
        public static function str2bin_xor( $input, $key )
        {
            $inpArr = str_split( $input );
            $keyArr = str_split( $key   );
            
            $inpLen = count( $inpArr );
            $keyLen = count( $keyArr );
            
            $outputArray = [];
            
            
            
            return $outputArray;
        }
    }

?>