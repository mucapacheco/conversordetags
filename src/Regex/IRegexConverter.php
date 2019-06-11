<?php

namespace WineGroup\ConversorTags\IRegexConverter;

use WineGroup\ConversorTags\ObjectValue\ConverterData;

interface IRegexConverter
{
    public function getMatches(ConverterData $dataConverter);
}