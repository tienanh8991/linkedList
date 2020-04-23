<?php


class MyLinkedList
{
    protected $count;
    protected $firstNode;
    protected $lastNode;

    public function __construct()
    {
        $this->count = 0 ;
        $this->firstNode = null;
        $this->lastNode = null;
    }
    public function addTop($data)
    {
        $newNode = new MyNode($data);
        $newNode->next = $this->firstNode;
        $this->firstNode = $newNode;
        if ($this->lastNode == null){
            $this->lastNode = $newNode;
        }
        $this->count++;
    }
    public function addEnd($data)
    {
        $newNode = new MyNode($data);
        if ($this->lastNode != null){
            $this->lastNode->next = $newNode;
            $newNode->next = null;
            $this->lastNode = $newNode;
            $this->count++;
        }else{
            $this->addTop($data);
        }
    }
    public function get($index)
    {
        $count = 0;
        $currentNode = $this->firstNode;
        while ($count < $index){
            $currentNode = $currentNode->next;
            $count++;
        }
        return $currentNode;
    }
    public function add($index,$value)
    {
        $newNode = new MyNode($value);
        $currentNode = $this->get($index - 1);
        $afterNode = $currentNode->next;
        $currentNode->next = $newNode;
        $newNode->next = $afterNode;
        $this->count++;
    }
    public function removeTop()
    {
        if ($this->firstNode != 0){
            $this->firstNode = $this->firstNode->next;
            $this->count--;
        }
    }
    public function removeEnd()
    {
        $currentNode = $this->firstNode;
        while ($currentNode->next != null){
            $currentNode = $currentNode->next;
        }
        $currentNode->next = null;
        $this->count--;
    }
    public function removeByIndex($index)
    {
        $beforeNode = $this->get($index - 1 );
        $afterNode = $beforeNode->next->next;
        $beforeNode->next = $afterNode;
        $this->count--;
    }
    public function getSize()
    {
        return $this->count;
    }
    public function printList()
    {
        $arrList = [];
        $currentNode = $this->firstNode;
        while ($currentNode != null){
            array_push($arrList,$currentNode->getData());
            $currentNode = $currentNode->next;
        }
        return $arrList;
    }
    public function contains($value)
    {
        $currentNode = $this->firstNode;
        while ($currentNode != null){
            if ($currentNode->getData() == $value){
                return 1;
            }
            $currentNode = $currentNode->next;
        }
        return 0;
    }
    public function indexOf($value)
    {
        $currentNode = $this->firstNode;
        $index = 0;
        while ($currentNode != null){
            if ($currentNode->getData() == $value){
                return $index;
            }
            $currentNode = $currentNode->next;
            $index++;
        }
        return -1;
    }
}