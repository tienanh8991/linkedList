<?php
include 'MyNode.php';
include 'MyLinkedList.php';

$link = new MyLinkedList();
$link->addTop(33);
$link->addEnd(22);
$link->addTop(11);
$link->addEnd(44);
$link->addEnd(55);
$link->addEnd(66);
$link->add(4,10);
$link->removeByIndex(3);
$link->removeTop();
$link->removeEnd();

echo $link->get(2)->getData().'<br>';
echo implode(',',$link->printList()).'<br>';
echo $link->getSize().'<br>';
echo $link->contains(22).', ';
echo $link->contains(44).'<br>';
echo $link->indexOf(22).', ';
echo $link->indexOf(44).'<br>';