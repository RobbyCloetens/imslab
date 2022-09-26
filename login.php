<?php
require_once './core/init.php';

if (Input::exists()) {
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'studenten_nr' => array('required' => true),
            'wachtwoord' => array('required' => true)
        ));
        if ($validation->passed()) {
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('studenten_nr'), Input::get('wachtwoord'), $remember);
            if ($login) {
                Redirect::to('homepage.php');
            } else {
                echo 'login mislukt';
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error, '<br>';
            }
        }
    }
 }

 ?>

  <?php #moet naar homepage
 require_once './core/init.php';
 if (Session::exists('home')) {
     echo '<p>' . Session::flash('home') . '</p>';
}

 $user = new User();
 if ($user->Aangemeld()) {
}

// ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <?php
    include_once "./core/init.php"
    ?>
    <H1>Login</H1>
    </br>
    <form action="" method="POST">
        <div>
            <label for="studenten_nr">
                Studenten nummer
            </label>
            <br><br>
            <input type="text" name="studenten_nr" id="studenten_nr" autocomplete="on">
        </div>
        <br>
        <div>
            <label for="wachtwoord">
                Wachtoord
            </label>
            <br><br>
            <input type="password" name="wachtwoord" id="wachtwoord" autocomplete="off">
        </div>

        <br><br><br>

        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <input type="submit" value="Log in">

    </form>



</body>

</html>