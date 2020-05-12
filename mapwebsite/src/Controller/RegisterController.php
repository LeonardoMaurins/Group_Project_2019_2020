<?php

namespace App\Controller;

use App\Entity\User;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class RegisterController extends AbstractController
{
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

                return $this->redirectToRoute('login');
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