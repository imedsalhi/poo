
 <?php 

require_once 'bdd.php';
require_once 'MainObjectBdd.php';


class People extends MainObjectBDD
{
    protected static $tablename='people';
     
  
   
     
       public function getAllEvents($filters){
           $filters['id']=$this->id;
        $bdd = BDD::getConnection();
       
        $clauses = [];
        foreach ($filters as $k => $f) {
            $clauses[] = $k.'='.$bdd->quote($f);
        }

        if (!empty($clauses)) {
            $condition = implode( "and p.",$clauses);
        }
        $query='SELECT e.* FROM events as e INNER JOIN event_people as ep ON e.id = ep.idEvent  INNER JOIN people as p ON p.id = ep.id_people where e.'.$condition;
 var_dump($query);
        $res = $bdd->query($query);
        return $res->fetchAll(PDO::FETCH_CLASS, 'Event');
           //a bosser
        // $result=Post::findAll($param);
        // return $result;
       }
}







