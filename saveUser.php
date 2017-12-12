<?php
require_once('config/config.php');

SSLon();

$userdata = unserialize($_SESSION['lomakedata']);  //tekstimuodosta takaisin taulukoksi
$data['email'] = $userdata['email'];
try {
	$STH = $DBH->prepare("SELECT * FROM kk_asiakas WHERE email=:email");
	$STH->execute($data);
	$row = $STH->fetch();  //Löytyiko sama email osoite?
	if($STH->rowCount() == 0){ //Jos ei niin rekisteröidään
		// lisää suola '!!'
		$userdata['pwd'] = md5($userdata['pwd'].'!!');  //hashataan salasana suolalla

	try {
			$STH2 = $DBH->prepare("INSERT INTO kk_asiakas (etunimi, sukunimi, email, puhelin, osoite, 
postinumero, kaupunki, pwd)
			VALUES (:etunimi, :sukunimi, :email, :puhelin, :osoite, :postinumero, :kaupunki, :pwd);");
			if($STH2->execute($userdata)){
					try { 
					//Jos käyttäjän tallennus onnistui asetetaan hänet loggautuneeksi 
					//eli kirjoitetaan käyttäjätiedot myös sessiomuuttujiin	
					$sql = "SELECT * FROM kk_asiakas WHERE kk_asiakas.ID = ".$DBH->lastInsertId().";";
					$STH3 = $DBH->query($sql);
					$STH3->setFetchMode(PDO::FETCH_OBJ);
					$user = $STH3->fetch();
					$_SESSION['kirjautunut'] = 'yes';
					$_SESSION['etunimi'] = $user->etunimi;
					$_SESSION['sukunimi'] = $user->sukunimi;
					$_SESSION['puhelin'] = $user->puhelin;
					$_SESSION['postinumero'] = $user->postinumero;
					$_SESSION['kaupunki'] = $user->kaupunki;
					$_SESSION['osoite'] = $user->osoite;
					$_SESSION['email'] = $user->email;
					redirect(index.php);  //Palaa heti index.php sivulle
				} catch(PDOException $e) {
					echo 'Käyttäjän tietojen hakuerhe';
					file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 3: 
'.$e->getMessage()."\n", FILE_APPEND);
				}
			}
		} catch(PDOException $e) {
			echo 'Tietojen lisäyserhe';
			file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 2: '.$e->getMessage()."\n", 
FILE_APPEND);
		}
	} else { 	echo 'Käyttäjä on jo olemassa.';
	}
} catch(PDOException $e) {	echo 'Tietokantaerhe.';
	file_put_contents('log/DBErrors.txt', 'tallennaKayttaja 1: '.$e->getMessage()."\n", FILE_APPEND);
}?>
