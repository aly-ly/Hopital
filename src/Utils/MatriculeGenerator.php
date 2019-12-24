<?php
namespace App\Utils;

use App\Controller\MedecinController;
use App\Entity\Medecin;
use App\Entity\Service;
use App\Repository\MedecinRepository;

class MatriculeGenerator {

private $matricule;
    public function __construct( MedecinRepository $medecinRepo)
    {
        $mat_format = "0000";
        $lastMedecin = $medecinRepo->findOneBy([],['id'=>'desc']);

        if($lastMedecin != null){
            $lastId = $lastMedecin->getId();
            $this->matricule = substr($mat_format, 0,-strlen($lastId)).((int)$lastId + 1);
        }else{
            $this->matricule = substr ($mat_format, 0,-1).'1';
        }
    }

public function generate(){

  /* $index = "M";
    $service = $service->getService()->getLibelle();
    $number_of_word = (str_word_count($service, 1));

   /*  if(count($number_of_word) >= 2){
        foreach($number_of_word as $k =>$v){
            $index.= strtoupper(substr($v, 0,1));
        }
    }else{
        $index.=strtoupper(substr($number_of_word[0],0,3));
    }*/

    return $this->matricule;

    }
  


}


?>