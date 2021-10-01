<?php
/**
 * Email
 * @author Ezechiel Kalengya Ezpk [ezechielkalengya@gmail.com]
 * Software Developer
*/
class Email
{
		/* Private Mail URL */
		private static $mailUrl;
		private static $email, $subject, $message;

		public static function send($email, $subject, $message){
			Email::$mailUrl  =  Config::get("url/mail_smtp"); 
			Email::setEmailParams($email, $message, $subject);
			Email::curl_post_async(Email::$mailUrl, Email::getEmailParamsArray());
		}

		public static function sendNoReply($email, $subject, $message){
			Email::$mailUrl  =  Config::get("url/mail_smtp_noreply"); 
			Email::setEmailParams($email, $message, $subject);
			Email::curl_post_async(Email::$mailUrl, Email::getEmailParamsArray());
		}

		public static function setEmailParams($email, $message, $subject){
			Email::$email   = $email;
			Email::$subject = $subject;
			Email::$message = $message;
		}

		public static function setEmailParamsArray($params){
			$params 		= (Object) $params;

			Email::$email   = $params->email;
			Email::$subject = $params->subject;
			Email::$message = $params->message;
		}

		public static function getEmailParamsArray(){
			$params_ = array(
				'email'   => Email::$email,
				'subject' => Email::$subject,
				'message' => Email::$message,
			);
			return (Array) $params_;
		}

        public static function curl_post_async($url, $params){
            foreach($params as $key => &$val):
                if (is_array($val)) $val = implode(',', $val);
                $post_params[]           = $key.'='.urlencode($val);
			endforeach;

            $post_string = implode('&', $post_params);
            $parts  	 = parse_url($url);
            $fp 		 = fsockopen($parts['host'], isset($parts['port'])? $parts['port']:80, $errno, $errstr, 300);

            $out = "POST ".$parts['path']." HTTP/1.1\r\n";
            $out.= "Host: ".$parts['host']."\r\n";
            $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
            $out.= "Content-Length: ".strlen($post_string)."\r\n";
            $out.= "Connection: Close\r\n\r\n";
            if (isset($post_string)) $out.= $post_string;

            fwrite($fp, $out);
            fclose($fp);

        }

		public static function sendEmail($email,$subject, $message){
			$url    =  Config::get("url/mail_smtp");
			$myvars = 'email=' . $email . '&message=' . $message . '&subject=' . $subject;
			$ch =   curl_init( $url );
					curl_setopt( $ch, CURLOPT_POST, 1);
					curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
					curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
					curl_setopt( $ch, CURLOPT_HEADER, 0);
					curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	
			$response = curl_exec( $ch );
		}

}	

 ?>


