<?php
 
require_once("agenda.php");
require_once("bdd.php");
require_once("event.php");
require_once("index.php");
require_once("people.php");
require_once ("MainObjectBdd.php");
/////////////////////////////////////////////////
 $a=Event::findAllByDate('2020-02-07');
  var_dump($a) ;
// //////////////////////////////////////////////////
  $b=Event::findOne(['id'=>1])->allPeople();
  var_dump($b);
//  //////////////////////////////
     $c=People::findOne(['name'=>'imed'])->getAllEvents(['date'=>'2020-03-06']) ;
     var_dump($c);
 /////////////////////////////////// tout les evenement de agenda de id =1 le jour de 2020/03/06
 $d=Agenda::findOne(['id'=>1])->getAllEvents(['datetime'=>'2020-02-07']);
 var_dump($d);