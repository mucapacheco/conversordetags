<?php

namespace WineGroup\ConversorTags\Regex;

use WineGroup\ConversorTags\ITagConverter;
use WineGroup\ConversorTags\ObjectValue\ConverterData;

class ArrobaComParenteses implements ITagConverter
{
    public function convert(ConverterData $dataConverter)
    {
        $re = '/@([\w]+)?\(([\p{Latin}[\w, ]+)\)/';
        $re = '/@([A-Z][\w]+)(\(([\p{Latin}[\w\.,-]+)\))?/';
        preg_match_all($re, $dataConverter->getHtml(), $matches, PREG_SET_ORDER, 0);

        foreach ($matches as &$match){
            if(isset($match[2])){
                unset($match[2]);
            }

            $match = array_values($match);
        }

        $dataConverter->setMatches($matches);

        return $dataConverter;
    }
}