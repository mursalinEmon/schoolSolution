<?php 

class Apptools{
    
    public static function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === ''
          || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }
    
    public static function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        if ($needle === '') {
            return true;
        }
        $diff = \strlen($haystack) - \strlen($needle);
        return $diff >= 0 && strpos($haystack, $needle, $diff) !== false;
    }

    public static function form_field_to_data($inputdata, $fields){
        $data = array();
        foreach($inputdata as $key=>$value){
            $data[$fields[$key]['ctrlfield']] = $value;
        }

        return $data;
    }
}

