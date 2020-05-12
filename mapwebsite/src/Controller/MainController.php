<?php

namespace App\Controller;

use App\Entity\Staff;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/selectuser", name="selectuser")
     */
    public function selectuser() {
        return $this->render('index/selectuser.html.twig');
    }

    /**
     * @Route("/main", name="main")
     */
    public function main() {
        return $this->render('main/main.html.twig');
    }

    /**
     * @Route("/underconstruction", name="underconstruction")
     */
    public function construction() {
        return $this->render('main/underconstruction.html.twig');
    }

    /**
     * @Route("/map", name="map")
     */
    public function map() {
        return $this->render('main/map.html.twig');
    }

    /**
     * @Route("/bustimetable", name="bustimetable")
     */
    public function bustimetable() {
        return $this->render('main/bustimetable.html.twig');
    }

    /**
     * @Route("/staffdirectory", name="staffdirectory")
     */
    public function staffdirectory() {

        $staffs = $this->getDoctrine()->getRepository
        (Staff::class)->findAll();

        $departments = [];

        foreach($staffs as $staff){
            if(!in_array($staff->getDepartment(), $departments)) {
                $departments[] = $staff->getDepartment();
            }
        }

        return $this->render('staffdirectory/staffdirectory.html.twig', ['staffs' => $staffs, 'departments' => $departments]);
    }

    /**
     * @Route("/search", name="search")
     * Method({"POST"}, {"GET"})
     */
    public function search()
    {
        $error = [];
        if (isset($_POST['browsers'])) {

            $searchValue = strtolower(trim($_POST['browsers']));

            if ($searchValue == "home"){
                return $this->main();
            }
            else if ($searchValue == "map"){
                return $this->map();
            }
            else if ($searchValue == "student services"){
                return $this->construction();
            }
            else if ($searchValue == "timetable"){
                return $this->construction();
            }
            else if ($searchValue == "bus schedule"){
                return $this->bustimetable();
            }
            else if ($searchValue == "staff directory"){
                return $this->staffdirectory();
            }
            else{
                $error = "Invalid Page Name";
            }
        }
        return $this->render('main/main.html.twig', ['error' => $error]);
    }
}