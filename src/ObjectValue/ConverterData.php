<?php

namespace WineGroup\ConversorTags\ObjectValue;

class ConverterData
{
    private $html;
    private $tag;
    private $class;
    private $params = [];
    private $data = [];
    private $listConverterData = [];
    private $matches;

    /**
     * @return mixed
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param mixed $html
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function getParam($index){
        if(isset($this->params[$index])){
            return $this->params[$index];
        }
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    public function getItemData($key){
        if(isset($this->data[$key])){
            return $this->data[$key];
        }
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return ConverterData[]
     */
    public function getListConverterData()
    {
        return $this->listConverterData;
    }

    /**
     * @return mixed
     */
    public function addConverterData($value)
    {
        return $this->listConverterData[]=$value;
    }

    /**
     * @param mixed $listConverterData
     */
    public function setListConverterData($listConverterData)
    {
        $this->listConverterData = $listConverterData;
    }

    public function setMatches($matches)
    {
        $this->matches = $matches;
    }

    /**
     * @return mixed
     */
    public function getMatches()
    {
        return $this->matches;
    }

    public function replaceHtml($string)
    {
        $this->html = str_replace($this->tag,$string,$this->html);
    }
}