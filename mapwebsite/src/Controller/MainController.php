<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Staff;
use App\Repository\UserRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

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
     * @Route("/underconstruction", name="previouspage")
     */
    public function previouspage() {
        return $this->redirect($request->headers->get('referer'));
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

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @Route("/signup", name="signup")
     * Method({"POST"}, {"GET"})
     */
    public function register(Request $request) {
        $errors = [];

        if ($request->getMethod() === 'POST'){
            $user = new User();

            $username = $request->get('username');
            $email = $request->get('email');
            $password = $request->get('password');
            $password_confirm = $request->get('password_confirm');

            $errors = $this->validateRegister($username, $email, $password, $password_confirm);

            if (!count($errors)){
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword(
                    $this->encoder->encodePassword($user, $password)
                );

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->redirectToRoute('index');
            }
        }
        return $this->render('signup/signup.html.twig', ['errors' => $errors]);
    }

    private function validateRegister($username, $email, $password, $password_confirm)
    {
        $users = $this->getDoctrine()->getRepository
        (User::class)->findAll();

        $errors = [];

        if (empty($username) OR empty($password) OR empty($password_confirm) OR empty($email)) {
            $errors[] = 'Missing Credentials';
        }

        if ($password !== $password_confirm){
            $errors[] = 'Passwords are not equal';
        }

        if (strlen($password) < 4 AND !empty($password)){
            $errors[] = 'Password is too short';
        }

        if(in_array($username, array_map(function ($user){return $user->getUsername(); }, $users))) {
            $errors[] = 'Username already exists';
        }

        // Using RegEx to check if the username starts with a B and continues with numbers up to 8
        // 9 in total and is case insensitive for the B
        if (!preg_match("/^B[0-9]{8}$/mi", $username) AND !empty($username))
        {
            $errors[] = 'Invalid Student ID (e.g. B00123456)';
        }

        // Same as before but with the additional email after the student ID
        if (!preg_match("/^B[0-9]{8}@mytudublin.ie$/mi", $email) AND !empty($email))
        {
            $errors[] = 'Invalid Email (e.g. B00123456@mytudublin.ie)';
        }

        return $errors;
    }
}