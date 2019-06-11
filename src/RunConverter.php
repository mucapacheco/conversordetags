<?php

namespace WineGroup\ConversorTags;

use WineGroup\ConversorTags\ObjectValue\ConverterData;

class RunConverter implements ITagConverter
{
    /**
     * @var ITagConverter[]
     */
    private $regexList = [];

    /**
     * @var ITagConverter[]
     */
    private $resolveRegexList = [];

    /**
     * @var ResolveClass
     */
    private $resolveClass = [];

    /**
     * RunConverter constructor.
     * @param ITagConverter[] $regexList
     * @param ITagConverter[] $resolveRegexList
     * @param ResolveClass $resolveClass
     */
    public function __construct(array $regexList, array $resolveRegexList, ResolveClass $resolveClass)
    {
        $this->regexList = $regexList;
        $this->resolveRegexList = $resolveRegexList;
        $this->resolveClass = $resolveClass;
    }

    public function convert(ConverterData $dataConverter)
    {
        foreach ($this->regexList as $regex){
            $regex->convert($dataConverter);
        }

        foreach ($this->resolveRegexList as $regex){
            $regex->convert($dataConverter);
        }

        foreach ($dataConverter->getListConverterData() as $innerDataConveter){
            $innerDataConveter->setHtml($dataConverter->getHtml());

            $closure = $this->resolveClass->getClass($innerDataConveter->getClass());

            if(!($closure instanceof \Closure)){
                continue;
            }

            $class = $closure();

            $class->convert($innerDataConveter);

            $dataConverter->setHtml($innerDataConveter->getHtml());
        }
    }
}