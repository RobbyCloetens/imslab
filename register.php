<?php

require_once './core/init.php';

#dit is het proces van de validatie van het registreren 
if (Input::exists()) {

    #if (Token::check(Input::get('token'))) {
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'studenten_nr' => array(
            'required' => true,
            'min' => 7,
            'max' => 8,
            'unique' => 'student'
        ),
        'wachtwoord' => array(
            'required' => true,
            'min' => 5

        ),
        'wachtwoord_again' => array(
            'required' => true,
            'matches' => 'wachtwoord'
        ),
        'naam' => array(
            'required' => true,
            'min' => 2,
            'max' => 50
        )

    ));

    // function Errormelding($validation) {
    //     if ($validation->passed()) {
    //         echo 'account aangemaakt!';
    //     } 
    //     else {
    //         foreach ($validation->errors() as $error) {
    //             echo $error, '<br>';
    //         }
    //     }
    // };

    if ($validation->passed()) {
        echo 'account aangemaakt!';
        $user = new User();

        $salt = Hash::salt(64);

        try {
            $user->create(array(
                'studenten_nr' => Input::get('studenten_nr'),
                'naam' => Input::get('naam'),
                'wachtwoord' => Hash::make(Input::get('wachtwoord'), $salt),
                'salt' => $salt,
            ));
            var_dump($user);
            session::flash('home', 'Je bent geregistreerd');
            Redirect::to('login.php');
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        foreach ($validation->errors() as $error) {
            echo $error, '<br>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create account</title>
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>

    <H1>Maak account</H1>
    <br>
    <br>
    <form action="" method="POST">
        <div class="field">
            <label for="studenten_nr">studenten nummer (r08...)</label> <br>
            <input type="text" name="studenten_nr" id="studenten_nr" value="<?php echo escape(Input::get('studenten_nr')); ?>" autocomplete="off">
        </div>
        <br>
        <div class="field">
            <label for="wachtwoord"> wachtwoord </label> <br>
            <input type="password" name="wachtwoord" id="wachtwoord">
        </div>
        <br>
        <div class="field">
            <label for="wachtwoord_again">herhaal wachtwoord</label><br>
            <input type="password" name="wachtwoord_again" id="wachtwoord_again">
        </div>
        <br>
        <div class="field">
            <label for="naam">voor en achternaam</label><br>
            <input type="text" name="naam" value="<?php echo escape(Input::get('naam')); ?>" id="naam">
        </div>
        <br>
        <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
        <br>
        <br>
        <input type="submit" value="Register">

    </form>
</body>

</html>