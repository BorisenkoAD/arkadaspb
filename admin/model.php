<?php
class auth {
	static $error_arr=array();
	static $error='';
	
		/**
	 *	Этот метод используется для регистрации нового пользователя
	 *	@return	boolean or string			return true or html code error
	 */
	function reg() {
		$tmp_arr=$_POST;
		$login=$tmp_arr['login'];
		$passwd=$tmp_arr['passwd'];
		$passwd2=$tmp_arr['passwd2'];
		$mail=$tmp_arr['mail'];
		if ($tmp_arr['sex']=='male') {
			$sex='1';
		} else {
			$sex='2';
		}
		//~ Check valid user data
		if ($this->check_new_user($login, $passwd, $passwd2, $mail)) {
			//~ User data is correct. Register.
			$user_key = $this->generateCode(10);
			$passwd = md5($user_key.$passwd.SECRET_KEY); //~ password hash with the private key and user key
			$stmt = $connection->query("INSERT INTO users (login_user, passwd_user, mail_user, sex_user, key_user) 
										VALUES 
										(:login,
										 :passwd,
										 :mail,
										 :sex,
										 ;user_key)"
										 );
			$stmt->bindParam(':login', $login);
			$stmt->bindParam(':passwd', $passwd);
			$stmt->bindParam(':passwd2', $passwd2);
			$stmt->bindParam(':mail', $mail);
			$stmt->bindParam(':sex', $sex);
			$stmt->bindParam(':user_key', $user_key);	
			$stmt->execute();			
			if ($stmt) {
				return true;
			} else {
				self::$error='An error occurred while registering a new user. Contact the Administration.';
				return false;
			}
		} else {
			return false;
		}
	}
}
?>