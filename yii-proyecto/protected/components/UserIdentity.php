<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
   private $_id;
  // private $_isAdmin;

    public function authenticate()
    {
       // $email=strtolower($this->username);
        $username=strtolower($this->username);
        //$user=Usuario::model()->findByAttributes(array('email'=>$email));
        $user=JosUsers::model()->findByAttributes(array('username'=>$username));
        if($user===null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }else{
            $password=$user->password;
            $mypassword=$this->password;
            $part = explode(":",$password);
            $salt = $part[1];
            $encrypted_password = md5($mypassword . $salt).":".$salt;
            if($user->password!==$encrypted_password&&$user->usertype=="Super Administrator"){
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }else
            {
                $this->_id=$user->username;
               // $this->setState('role', $user->rol);
               //  $this->setState('admin', 1);


                            $auth=Yii::app()->authManager;
                            /*
                            $bizRule='return !Yii::app()->user->isGuest;';
                            $auth->createRole('authenticated', 'authenticated user', $bizRule);

                            $bizRule='return Yii::app()->user->isGuest;';
                            $auth->createRole('guest', 'guest user', $bizRule);

                            $bizRule='return Yii::app()->user->isAdmin;';
                            $auth->createRole('admin', 'admin user', $bizRule);
                            */
                            //$auth->assign('admin',$this->id);

               // $this->email=$user->email;
                $this->errorCode=self::ERROR_NONE;
            }
        }
        return $this->errorCode==self::ERROR_NONE;
    }
    /*
    public function getIsAdmin(){
	    return $this->_isAdmin;
    	
    }
    */
 
    public function getId()
    {
        return $this->_id;
    }

}