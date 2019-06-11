<?php

namespace WineGroup\ConversorTags;

use WineGroup\ConversorTags\ObjectValue\ConverterData;

class ConverterDefault implements ITagConverter
{
    private $delimiter = ',';

    /**
     * ConverterDefault constructor.
     * @param string $delimiter
     */
    public function __construct($delimiter)
    {
        $this->delimiter = $delimiter;
    }


    public function convert(ConverterData $dataConverter)
    {
       $matchers = $dataConverter->getMatches();

        foreach ($matchers as $matcher){
            $obj = new ConverterData();
            $obj->setTag($matcher[0]);
            $obj->setClass($matcher[1]);
            if(isset($matcher[2])){
                $obj->setParams(array_map('trim',explode($this->delimiter,$matcher[2])));
            }
            $obj->setData($dataConverter->getData());
            $dataConverter->addConverterData($obj);
        }

        return $dataConverter;
    }
}