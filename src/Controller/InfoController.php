<?php

namespace App\Controller;
/**
 * Created by PhpStorm.
 * User: cpuscas
 * Date: 9/4/2018
 * Time: 9:49 AM
 */

use App\Service\CheckType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



class InfoController extends AbstractController
{

    private $check;


    public function __construct(CheckType $check)
    {
        $this->check=$check;
    }

    /**
     * @Route("/app/show/{id}",name="convert_json",defaults={"id"="1"},requirements={"id"="\d+"})
     */
    public function show(Request $req, $id){

        $encoders=array(new XmlEncoder(),new JsonEncode());
        $normalizers=array(new ObjectNormalizer());
        $serializer=new Serializer($normalizers,$encoders);


        $slug=$req->get('type');


        $result=$this->check->createEntityForArray($id,$slug);

        return new Response($serializer->serialize($result,'json'));

    }

}