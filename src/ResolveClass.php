<?php

namespace WineGroup\ConversorTags;

use WineGroup\ConversorTags\ObjectValue\ConverterData;
use WineGroup\ConversorTags\TagsClass\TagPessoa;

class ResolveClass
{
    private $classes = [];

    /**
     * ResolveClass constructor.
     * @param array $classes
     */
    public function __construct(array $classes)
    {
        $this->classes = $classes;
    }

    /**
     * @param $key
     * @return ITagConverter
     */
    public function getClass($key){
        if(isset($this->classes[$key])){
            return $this->classes[$key];
        }
    }
}