<?PHP
	function DecodificaHexa($l_sOctet)
	{
		$nCifra1 = ord($l_sOctet[0]);
		if ($nCifra1 >= 97) $nCifra1 -= 87;
		else
			if ($nCifra1 >= 65) $nCifra1 -= 55;
			else $nCifra1 -= 48;
		$nCifra2 = ord($l_sOctet[1]);
		if ($nCifra2 >= 97) $nCifra2 -= 87;
		else
			if ($nCifra2 >= 65) $nCifra2 -= 55;
			else $nCifra2 -= 48;
		return $nCifra1 * 16 + $nCifra2;
	}

	$sParam = $_POST["parametri"];
	$nPozitie = 0;

	$param_data = substr($sParam, $nPozitie, 10);
	$nPozitie += 10;

	$param_idjoc = DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	$param_subtip = DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	$param_dificultate = DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	$param_numar_exercitii = DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	$param_raspunsuri_corecte = DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	$param_cel_mai_rapid_raspuns = DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
	$nPozitie += 2;
	$param_cel_mai_rapid_raspuns += DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;
	$param_cel_mai_rapid_raspuns /= 10.0;

	$param_cel_mai_lent_raspuns = DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
	$nPozitie += 2;
	$param_cel_mai_lent_raspuns += DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;
	$param_cel_mai_lent_raspuns /= 10.0;

	$param_timp_mediu_de_raspuns = DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
	$nPozitie += 2;
	$param_timp_mediu_de_raspuns += DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;
	$param_timp_mediu_de_raspuns /= 10.0 * $param_raspunsuri_corecte;

	$param_scor = DecodificaHexa(substr($sParam, $nPozitie, 2)) * 256.0;
	$nPozitie += 2;
	$param_scor += DecodificaHexa(substr($sParam, $nPozitie, 2));
	$nPozitie += 2;

	echo "Param = ".$sParam."<br>Data = ".$param_data."<br>ID joc = ".$param_idjoc."<br>Subtip = ".$param_subtip."<br>Dificultate = ".$param_dificultate."<br>Numar exercitii = ".$param_numar_exercitii."<br>Raspunsuri corecte = ".$param_raspunsuri_corecte."<br>Cel mai rapid raspuns = ".$param_cel_mai_rapid_raspuns."<br>Cel mai lent raspuns = ".$param_cel_mai_lent_raspuns."<br>Timp mediu de raspuns = ".$param_timp_mediu_de_raspuns."<br>Scor = ".$param_scor;

	// === PARAMETRI ===
/*
		$param_data						data si ora, in format AALLZZOOMM (an, luna, zi, ora, minut)
		$param_idjoc					ID joc ( == 1)
		$param_subtip					nefolosit
		$param_dificultate				nivel de dificultate
		$param_numar_exercitii			numar de exercitii
		$param_raspunsuri_corecte		raspunsuri corecte
		$param_cel_mai_rapid_raspuns	cel mai rapid raspuns
		$param_cel_mai_lent_raspuns		cel mai lent raspuns
		$param_timp_mediu_de_raspuns	timp mediu de raspuns
		$param_scor						scor
*/
?>
