<?php

    namespace M4rconverter\Helpers;

    trait TimeFunctions {

        protected function timeToseconds($str){
            list($h, $m, $s) = explode(':', $str);
            return ($h * 3600) + ($m * 60) + $s;
        }
    }