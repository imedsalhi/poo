
 <?php 

require_once 'bdd.php';
require_once 'MainObjectBdd.php';


class Event extends MainObjectBDD
{
    protected static $tablename='events';
    
       public  static function FindAllByDate($date){
           $param['Date(datetime)']=$date;
           $x=self::findAll($param);
            return $x ;
      
       }
       public function AllPeople(){
        $bdd = BDD::getConnection();
        $query='SELECT p.* FROM people as p INNER JOIN event_people as ep ON p.id = ep.id_people  INNER JOIN events as e ON e.id = ep.idEvent where e.id='.$this->id;
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, 'People');
        
       }
}







