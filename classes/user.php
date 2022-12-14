<?php
class User
{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $_Aangemeld;




    public function __construct($user = null)
    {
        $this->_db = DB::getInstance();

        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');


        if (!$user) {
            if (Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if ($this->find($user)) {
                    $this->_Aangemeld = true;
                } else {
                    //logout
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function update($fields = array(), $id = null)
    {

        if (!$id && $this->Aangemeld()) {
            $id = $this->data()->id;
        }

        if (!$this->_db->update('student', $id, $fields)) {
            throw new Exception('Er was een probleem bij het updaten.');
        }
    }

    public function create($fields = array())
    {
        if ($this->_db->insert('student', $fields)) {
            throw new Exception('Er was een probleem bij het creëren van u account.');
        }
    }

    public function find($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'studenten_nr';
            $data = $this->_db->get('student', array($field, '=', $user));

            if ($data->count()) {
                $this->_data = $data->First();
                return true;
            }
        }
        return false;
    }

    public function Login($studenten_nr = null, $wachtwoord = null, $remember = false)
    {

        if (!$studenten_nr && !$wachtwoord && $this->exists()) {
            //log een student in
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($studenten_nr);

            if ($user) {
                if ($this->data()->wachtwoord === Hash::make($wachtwoord, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } else {
                            $hash = $hashCheck->First()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }

        return false;
    }

    public function hasPermission($key)
    {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if ($group->count()) {
            $permissions = json_decode($group->First()->persmissions, true);

            if ($permissions[$key] === true) {
                return true;
            }
        }
        return false;
    }

    public function exists()
    {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout()
    {

        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data()
    {
        return $this->_data;
    }

    public function Aangemeld()
    {
        return $this->_Aangemeld;
    }
}
