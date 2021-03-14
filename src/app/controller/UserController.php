<?php


namespace app\controller;


use app\model\User;

/**
 * @var User $user
 */

class UserController extends MainController
{
    protected $controllerName = 'User';

    public function actionLogin()
    {
        // Bejelentkezés végrehajtása

        if (!empty($_POST['email']) && !empty($_POST['password']))
        {
            if (User::findOneByEmail($_POST['email']) != null)
            {
                $user = User::findOneByEmail(trim($_POST['email']));
                if($user->doLogin(trim($_POST['password'])))
                {
                    $_SESSION['userId'] = $user->getId();
                    header("Location: /zarodolgozat/");
                    exit();
                }
                else
                {
                    $_SESSION['errorMadeByUser'] = 'wrongEmailOrPassword';
                    header("Location: /zarodolgozat/?controller=user&action=login");
                    exit();
                }
            }
            else
            {
                $_SESSION['errorMadeByUser'] = 'wrongEmailOrPassword';
                header("Location: /zarodolgozat/?controller=user&action=login");
                exit();
            }
        }

        // Bejelentkező oldal betöltése

        $this->title = "Bejelentkezés";
        return $this->render('login');
    }

    public function actionLogout()
    {
        $_SESSION['userId'] = '';
        unset($_SESSION['userId']);
        header('Location: /zarodolgozat/');
        exit();
    }

    public function actionRegistration()
    {
        // Regisztráció végrehajtása

        $user = new User();

        if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
        {
            // Ha létezik az adatbázisban a felhasználó, nem veszi fel az adatot, és hibával jelez a felhasználónak
            if (!empty(User::findOneByUsername($_POST['username'])) && User::findOneByUsername($_POST['username'])->getUsername() == $_POST['username'])
            {
                $_SESSION['errorMadeByUser'] = 'usernameAlreadyInUse';
                header("Location: /zarodolgozat/?controller=user&action=registration");
                exit();
            }
            // Ha létezik az adatbázisban az email cím, nem veszi fel az adatot, és hibával jelez a felhasználónak
            elseif (!empty(User::findOneByEmail($_POST['email'])) && User::findOneByEmail($_POST['email'])->getEmail() == $_POST['email'])
            {
                $_SESSION['errorMadeByUser'] = 'emailAlreadyInUse';
                header("Location: /zarodolgozat/?controller=user&action=registration");
                exit();
            }
            // Ha egyik sem létezik az adatbázisban, akkor felveszi a regisztrált adatokat, és a főoldalra irányít. Így még nincs bejelentkezve a felhasználó
            if ($user->registrateUser(trim($_POST['username']), trim($_POST['password']), trim($_POST['email']), 'user')) {
                header("Location: /zarodolgozat/");
                exit();
            }
        }

        // Regisztráló oldal betöltése

        $this->title = "Regisztráció";
        return $this->render('registration',[
            'user' => $user
        ]);
    }

    public function actionAccount()
    {
        $this->title = "Fiókom";
        return $this->render('account');
    }
}