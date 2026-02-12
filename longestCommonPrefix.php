<?php 
    //DUMBEST ONE USING COUNTER TO DETECT ANOMALI
    function longestCommonPrefix($strs) {
            $first = true; 
            $length = count($strs);
            $putar = 0;
            $prefix = "";
            $chars = str_split($strs[0]);
            foreach($chars as $single){
                foreach($strs as $char){
                    if($first){
                        $first = false;
                    }else{
                        if (str_starts_with($char, $prefix.$single)) {
                            $putar += 1;
                        }
                    }
                };
                $first = true;
                if($putar == $length - 1){
                    $prefix = $prefix.$single; 
                }
                else{
                    break;
                }

            }
            return $prefix;
    }

    //USING COUNTER BUT MORE SIMPLE
    function longestCommonPrefix2($strs) {
        $length = count($strs);
        if ($length == 0) return "";

        $prefix = "";
        $chars = str_split($strs[0]);

        foreach ($chars as $single) {
            $nextPrefix = $prefix . $single;
            $matchCount = 0;

            foreach ($strs as $str) {
                if (str_starts_with($str, $nextPrefix)) {
                    $matchCount++;
                } else {
                    return $prefix; 
                }
            }

            if ($matchCount === $length) {
                $prefix = $nextPrefix;
            }
        }

        return $prefix;
    }

    //USING STRPOS WHILE SECTION 
    // MORE EASY BUT I STILL HAD HEADACHE
    function longestCommonPrefix3($strs) {
        if (count($strs) === 0) return "";

        $prefix = $strs[0];

        for ($i = 1; $i < count($strs); $i++) {
            while (strpos($strs[$i], $prefix) !== 0) {
                $prefix = substr($prefix, 0, -1);
                if ($prefix === "") return "";
            }
        }

        return $prefix;
    }


?>