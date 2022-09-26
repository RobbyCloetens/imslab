<?php
require_once 'core/init.php';

$user = new User();

if(!$user->Aangemeld()) {
    Redirect::to('index.php');
}

if(Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'naam' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));

        if($validation->passed()) {

            try {
                $user->update(array(
                    'naam' => Input::get('naam')
                ));

                Session::flash('home', 'Jouw gegevens zijn geüpdate.');
                Redirect::to('index.php');

            } catch(Exception $e) {
                die($e->getMessage());
            }
        }
        else {
            foreach($validation->errors() as $error) {

            }
        }
    }
}

?>

<form action="" method="post">
    <div class="field">
        <label for="naam">Naam</label>
        <input type="text" name="naam" value="<?php echo escape($user->data()->name); ?>">

        <input type="submit" value="Update">
        <input type="hidden"> name="token" value="<?php echo Token::generate(); ?>">
    </div>
</form>
