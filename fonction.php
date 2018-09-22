<?php
    class Securite // CAS D'UTILISATION
        /* pour utiliser la classe securité dans les requetes SQL:
        	$nom = Securite::secure($_POST['nom']);  par exemple. 
        */
        
    {
        // Données entrantes
        public static function secure($string)
        {   
            $mysqli = new mysqli("localhost", "root", "", "EnsiPartage");

            // On regarde si le type de string est un nombre entier (int)
            if(ctype_digit($string))
            {
                $string = intval($string);
            }
            // Pour tous les autres types
            else
            {

                /* Vérification de la connexion */
                if (mysqli_connect_errno()) {
                    printf("Échec de la connexion : %s\n", mysqli_connect_error());
                    exit();
                }
                $string = $mysqli->real_escape_string($string);
				$string = addcslashes($string,'%_');
            }
            $mysqli->close();
            return $string;

        }
        // Données sortantes
        public static function html($string)
        {	
            return htmlentities($string);
        }
    }

	function expiration(){
		if ( $_SESSION['etatConnexion']) {
		 if (time()-$_SESSION['activity'] > 300) {   //default timeout
				$_SESSION['expire']=true;
				?>
			<script>
				alert('Session expirée')
				window.location.replace("valide_dec.php")
			</script>
		<?php
		}
		else {
  			$_SESSION['activity'] = time(); // on relance
		}
	}else{
		header('location:index.php');
		}
	}
	
    function cryptage($str) {
		$options = ['cost' => 12,];
		$crypte = password_hash($str, PASSWORD_BCRYPT, $options);
		
		return $crypte;
	}
	
	
	function mailactivation($mail,$cle,$userid){
		$destinataire = Securite::html($mail);
		$sujet = "Activer votre compte" ;
		$entete = "From: activation.ensipartage@gmail.com" ;
		$monUrl = "http://".$_SERVER['SERVER_NAME'];
		 
		$message = 'Bienvenue sur EnsiPartage,
		 
		Pour activer votre compte, veuillez cliquer sur le lien ci dessous
		ou le copier/coller dans votre navigateur internet.
		 
		'.$monUrl.'/validation.php?log='.urlencode($userid).'&cle='.urlencode($cle).'
		 
		 
		---------------
		Ceci est un mail automatique, Merci de ne pas y répondre.';
		 
		 
		mail($destinataire, $sujet, $message, $entete) ; // Envoi du mail
	}
	
	function pair($nombre) {
		if($nombre%2 == 0) return true;
		return false;
	}
	
	function analyseur($text){
		//affiche les retours chariots
		str_replace(Securite::html('\r\n'), '<br>',$text);
		
		//affiche les liens youtubes en vidéo
		if(preg_match("#https?://www\.youtube\.com/watch\?v=#i",$text)){			
			$debut = strpos($text, "https://www.youtube.com/watch?v=");
			$fin = 43;
			$url = substr($text, $debut, $fin);
			$text = preg_replace("#https?://www\.youtube\.com/watch\?v=.{11}#i", "", $text);
			$urlfinal = substr_replace($url,"embed/",24,8);
			$text = '<iframe width="427" height="240" src='.$urlfinal.' controls></iframe>';
		}
		if (preg_match("#\.jpg|\.jpeg|\.gif|\.png#", $text)){
			preg_replace('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{0,})([\/\w \.-]*)*\/?$/','<img src="$0">',$text);
		}

		return $text;
	}
	
?>