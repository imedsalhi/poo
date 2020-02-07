
 <?php 

require_once 'bdd.php';
require_once 'MainObjectBdd.php';


class Agenda extends MainObjectBDD
{
    protected static $tablename='agenda';
//permet de recuperer tout les evenement d'un agenda !
       public function getAllEvents($param=[]){
        $param['idAgenda']=$this->id;
        $bdd = BDD::getConnection();
        $where = '';
        $formatdate=['date','datetime'];
        $clauses = [];
        foreach ($param as $k => $f) {
            if (in_array($k,$formatdate)) {
                $s='Date('.$k.')';
                $k=$s;
            }
            $clauses[$k] = $f;
        }

        var_dump($clauses);
        $result=Event::findAll($clauses);
        return $result;
       }
}







