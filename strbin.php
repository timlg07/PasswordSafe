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
            
            for( $i=0; $i<$inpLen; ){
                for( $j=0; $j<$keyLen && $i<$inpLen; $j++, $i++ ){
                    $xor = ord( $inpArr[$i] ) ^ ord( $keyArr[$j] );
                    array_push( $outputArray,decbin( $xor ));
                }
            }
            
            return $outputArray;
        }
        
        public static function bin2str_xor( $binArr, $key )
        {
            $keyArr = str_split( $key );
            $binLen = count( $binArr  );
            $keyLen = count( $keyArr  );
            
            $outputString = "";
            
            for( $i=0; $i<$binLen; ){
                for( $j=0; $j<$keyLen && $i<$binLen; $j++, $i++ ){
                    $xor = bindec( $binArr[$i] ) ^ ord( $keyArr[$j] );
                    $outputString .= chr( $xor );
                }
            }
            
            return $outputString;
        }
        
    }

?>