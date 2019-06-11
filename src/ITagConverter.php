<?php

namespace WineGroup\ConversorTags;

use WineGroup\ConversorTags\ObjectValue\ConverterData;

interface ITagConverter
{
    public function convert(ConverterData $dataConverter);
}