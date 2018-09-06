<?php
/**
 * Created by PhpStorm.
 * User: cpuscas
 * Date: 9/4/2018
 * Time: 3:25 PM
 */

namespace App\Service;



use App\Repository\GCORepository;
use App\Entity\Competences;


class CheckType
{

   private $GCORepo;

   public function __construct(GCORepository $GCORepo )
   {
       $this->GCORepo=$GCORepo;
   }


public function createEntityForArray($id,$type){
       $result=$this->CheckType($id,$type);
    $all=array();
    for ($i=0;$i<count($result);$i++){
        $elem=new Competences();
        $elem->setId($id);
        $elem->setUserName($result[$i]["user_name"]);
        $elem->setTechnologyName($result[$i]["technology_name"]);
        $elem->setLevel($result[$i]["level"]);
        if (!isset($result[$i]["type"])){
            $elem->setType(NULL);
        }else {
            $elem->setType($result[$i]["type"]);
        }
        if (!isset($result[$i]["handled_name"])) {
            $elem->setHandledName(NULL);
        }else {
            $elem->setHandledName($result[$i]["handled_name"]);
        }
        if (!isset($result[$i]["event_date"])) {
            $elem->setType(NULL);
        }else {
            $elem->setEventDate($result[$i]["event_date"]);
        }
        if (!isset($result[$i]["since"])) {
            $elem->setSince(NULL);
        }else {
            $elem->setSince($result[$i]["since"]);
        }
        array_push($all,$elem);
    }
    return $all;
}



public function get_cc_hc($id){
       $current=$this->GCORepo->get_current_competences($id);

       $older=$this->GCORepo->get_older_competences($id);

     $result=array_merge($current,$older);

       return $result;
}

public function checkType($id,$type){
    if ($type=="current"){
        $result=$this->GCORepo->get_current_competences($id);
    }elseif ($type=="older"){
        $result=$this->GCORepo->get_older_competences($id);
    }elseif ($type=="pending"){
        $result=$this->GCORepo->get_pending_competences($id);
    }else{
        $result=$this->get_cc_hc($id);
    }
    return $result;
}
}

// public function checkType($id,$type){
////$elem=new Competences();
//       if ($type=='current'){
//           //           $result=$this->GCORepo->get_currents_competences($id);
//           $result=$this->GCORepo->get_current_competences($id);
//           $all=array();
//           for ($i=0;$i<count($result);$i++){
//               $elem=new Competences();
//           $elem->setUserName($result[$i]['user_name']);
//           $elem->setId($id);
//           $elem->setTechnologyName($result[$i]["technology_name"]);
//           $elem->setLevel($result[$i]["level"]);
//           $elem->setSince($result[$i]["since"]);
//           array_push($all,$elem);
//
//
//           }
//
//       }elseif ($type=="older"){
////           $result=$this->GCORepo->get_older_competences($id);
//           $result=$this->GCORepo->get_older_competences($id);
//           $all=array();
//           for ($i=0;$i<count($result);$i++){
//               $elem=new Competences();
//           $elem->setUserName($result[$i]["user_name"]);
//           $elem->setId($id);
//           $elem->setTechnologyName($result[$i]["technology_name"]);
//           $elem->setLevel($result[$i]["level"]);
//           $elem->setEventDate($result[$i]["event_date"]);
//           $elem->setHandledName($result[$i]["handled_name"]);
//           $elem->setType($result[$i]["type"]);
//               array_push($all,$elem);
//
//
//           }
//
//
//       }elseif ($type=="pending"){
////           $result=$this->GCORepo->get_pending_competences($id);
//           $result=$this->GCORepo->get_pending_competences($id);
//           $all=array();
//           for ($i=0;$i<count($result);$i++){
//               $elem=new Competences();
//           $elem->setUserName($result[$i]["user_name"]);
//           $elem->setTechnologyName($result[$i]["technology_name"]);
//           $elem->setLevel($result[$i]["level"]);
//               array_push($all,$elem);
//
//
//           }
//       }
//    else{
//    //           $result=$this->get_cc_hc($id);
//        $result=$this->get_cc_hc($id);
//
//        $all=array();
//        for ($i=0;$i<count($result);$i++){
//            $elem=new Competences();
//            $elem->setId($id);
//            $elem->setUserName($result[$i]["user_name"]);
//            $elem->setTechnologyName($result[$i]["technology_name"]);
//            $elem->setLevel($result[$i]["level"]);
//            if (!isset($result[$i]["type"])){
//                $elem->setType(NULL);
//            }else {
//                $elem->setType($result[$i]["type"]);
//            }
//            if (!isset($result[$i]["handled_name"])) {
//                $elem->setHandledName(NULL);
//            }else {
//                $elem->setHandledName($result[$i]["handled_name"]);
//            }
//            if (!isset($result[$i]["event_date"])) {
//                $elem->setType(NULL);
//            }else {
//                $elem->setEventDate($result[$i]["event_date"]);
//            }
//            if (!isset($result[$i]["since"])) {
//                $elem->setSince(NULL);
//            }else {
//                $elem->setSince($result[$i]["since"]);
//            }
//            array_push($all,$elem);
//        }
//      }
//     return $all;
//
// }
//
//}