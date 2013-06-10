var g_nSubtip = 0;
var g_nDificultate;
var g_nStare;
var g_nIndexPaginaInstructiuni;
var g_nIndexExercitiu;
var g_bGreseala;
var g_nNumarExercitii;
var g_nRaspunsuriCorecte;
var g_nSecundeRamase;
var g_nZecimiDeSecunda;
var g_nZecimiDeSecundaExercitiu;
var g_nZecimiDeSecundaIntreAfisari;
var g_bIntreAfisari;
var g_nTimpTotal;
var g_nTimpTotalAnterior = -1;
var g_nRaspunsuriCorecteAnterior = -1;
var g_nDificultateAnterioara;
var g_nCelMaiRapidRaspuns;
var g_nCelMaiLentRaspuns;
var g_nScor = 0;
var g_bMouseDrag = false;
var g_bAjustareDificultate = false;

var cg_asCulori = new Array
							(
								"#ff0000",
								"#00dd00",
								"#0022ff",
								"#e8e800",
								"#ee00ff",
								"#773300"
							);
var g_anPermutare = new Array();
var g_nIndexForma, g_nIndexCuloare;
var g_nIndexFormaAnterioara, g_nIndexCuloareAnterioara;
var g_bIdentic;

var g_cCanvas;
var g_cContext;
var g_nTimerID;
var g_cXMLHTTP;
var g_nMouseX = 0, g_nMouseY = 0;

var g_nPaginiInstructiuni = 2;
var g_nImaginiDeIncarcat = 12;
var g_nImaginiIncarcate;
var g_acImagini = new Array();
var g_asFisiereImagini = new Array
								(
									PATH + "imagini/buton-text-normal.png",
									PATH + "imagini/buton-text-activat.png",
									PATH + "imagini/buton-text-apasat.png",
									PATH + "imagini/meniu-jos.jpg",
                                    PATH+"math/joc1/lang-" + LIMBA + "/instructiuni-1.png",
                                    PATH+"math/joc1/lang-" + LIMBA + "/instructiuni-2.png",
									PATH + "imagini/buton-stanga-normal.png",
									PATH + "imagini/buton-stanga-activat.png",
									PATH + "imagini/buton-stanga-apasat.png",
									PATH + "imagini/buton-dreapta-normal.png",
									PATH + "imagini/buton-dreapta-activat.png",
									PATH + "imagini/buton-dreapta-apasat.png"
								);
var IMG_MENIU = 3;
var IMG_BUTON_TEXT = 0;
var IMG_BUTON_STINGA = 6;
var IMG_BUTON_DREAPTA = 9;
var IMG_INSTRUCTIUNI = 4;

var g_sExtensieFisiereAudio;
var g_bSuportSunet;
var g_nSuneteIncarcate;
var g_nSuneteDeIncarcat = 4;
var g_acSunete = new Array();
var g_asFisiereSunete = new Array
								(
									PATH + "sunete/buton",
									PATH + "sunete/corect",
									PATH + "sunete/gresit",
									PATH + "sunete/tictac"
								);

var g_cButonStart;
var g_cButonInstructiuni;
var g_cButonStart2;
var g_cButonStinga;
var g_cButonDreapta;
var g_cButonJocNou;
var g_cButonReset;
var g_cButonIdentic;
var g_cButonDiferit;

function Init()
{
	var cAudio;
	var i;

	g_nStare = 0;
	g_bMouseDrag = false;
	g_bAjustareDificultate = false;

	if (window.XMLHttpRequest) g_cXMLHTTP = new XMLHttpRequest();
	else g_cXMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
	g_cXMLHTTP.onreadystatechange = MesajDeLaServer;

	g_cCanvas = document.getElementById("canvasjoc");
	g_cContext = g_cCanvas.getContext("2d");

	g_cContext.lineWidth = 2;
	g_cContext.strokeStyle = "#000000";
	g_cContext.strokeRect(217.5, 230.5, 206, 20);
	g_cContext.lineWidth = 1;
	g_cContext.strokeStyle = "#00c000";
	g_cContext.strokeRect(220.5, 233.5, 200, 14);

	document.getElementById("se_incarca").style.left = (g_cCanvas.offsetLeft + 304).toString() + "px";
	document.getElementById("se_incarca").style.top = (g_cCanvas.offsetTop + 334).toString() + "px";
	document.getElementById("se_incarca").style.zIndex = g_cCanvas.zIndex + 1;

	document.onkeydown = EvenimentTastatura;
	g_cCanvas.addEventListener("mousemove", EvenimentMiscareMouse, false);
	g_cCanvas.addEventListener("mousedown", EvenimentMouseApasat, false);
	g_cCanvas.addEventListener("mouseup", EvenimentMouseRidicat, false);

	g_bSuportSunet = true;
	try
	{
		cAudio = document.createElement("audio");
		if (cAudio.canPlayType("audio/mpeg;") == "")
			if (cAudio.canPlayType("audio/wav;") == "") g_bSuportSunet = false;
			else g_sExtensieFisiereAudio = ".wav";
		else g_sExtensieFisiereAudio = ".mp3";
		if (g_bSuportSunet)
		{
			for(i=0; i<g_nSuneteDeIncarcat; i++)
			{
				g_acSunete[i] = new Audio();
				g_acSunete[i].src = g_asFisiereSunete[i] + g_sExtensieFisiereAudio;
				g_acSunete[i].load();
				g_acSunete[i].volume = 0.6;
			}
			g_acSunete[0].volume = 0.2;
		}
	}
	catch(eroare)
	{
		g_bSuportSunet = false;
	}

	for(i=0; i<g_nImaginiDeIncarcat; i++)
	{
		g_acImagini[i] = new Image();
		g_acImagini[i].onload = EvenimentImagineIncarcata;
	}
	g_nImaginiIncarcate = 0;
	window.setTimeout(IncarcaImagineaUrmatoare, 0);
}

function PaginaInitiala()
{
	g_cContext.clearRect(0, 0, 640, 480);
	AfisareStarea1();
	SchimbaStarea(1);
}

function StartJoc()
{
    document.getElementById("debug").innerHTML="";
	var abDisponibil = new Array();
	var nRandom;
	var i, j;

	g_nTimpTotal = 0;
	g_nIndexExercitiu = 0;
	g_nRaspunsuriCorecte = 0;
	g_nCelMaiRapidRaspuns = TIMP_LIMITA * 10;
	g_nCelMaiLentRaspuns = 0;

	g_nSecundeRamase = TIMP_LIMITA;
	g_nZecimiDeSecunda = TIMP_LIMITA * 10;
	g_nZecimiDeSecundaExercitiu = 0;
	g_bGreseala = false;

	for(i=0; i<6; i++)
	{
		g_anPermutare[i] = i;
		abDisponibil[i] = true;
	}
	if (g_nDificultate == 2)
		for(i=0; i<6; i++)
		{
			nRandom = Random(0, 5 - i);
			for(j=0; j<6; j++)
				if (abDisponibil[j])
					if (nRandom) nRandom--;
					else
					{
						abDisponibil[j] = false;
						g_anPermutare[j] = i;
						break;
					}
		}

	g_nIndexFormaAnterioara = Random(0, 5);
	switch (g_nDificultate)
	{
		case 1:	{
					g_nIndexCuloareAnterioara = g_nIndexFormaAnterioara;
					break;
				}
		case 2:	{
					g_nIndexCuloareAnterioara = g_anPermutare[g_nIndexFormaAnterioara];
					break;
				}
		case 3:	{
					g_nIndexCuloareAnterioara = Random(0, 5);
					break;
				}
	}
	g_nIndexForma = g_nIndexFormaAnterioara;
	g_nIndexCuloare = g_nIndexCuloareAnterioara;

	g_bIntreAfisari = true;
	g_nZecimiDeSecundaIntreAfisari = -15;
	DeseneazaMeniu();
	AfisarePrimul();

	g_nTimerID = window.setInterval(Cronometru, 100);

	SchimbaStarea(3);
}

function GenerareExercitiu()
{
	var nRandom;
	var i;

	g_nIndexCuloareAnterioara = g_nIndexCuloare;
	g_nIndexFormaAnterioara = g_nIndexForma;

	if (Random(0, 1) == 1) g_bIdentic = true;
	else
	{
		g_bIdentic = false;
		switch (g_nDificultate)
		{
			case 1:	{
						nRandom = Random(0, 4);
						for(i=0; i<6; i++)
							if (i != g_nIndexFormaAnterioara)
								if (nRandom) nRandom--;
								else
								{
									g_nIndexForma = i;
									g_nIndexCuloare = i;
									break;
								}
						break;
					}
			case 2:	{
						nRandom = Random(0, 4);
						for(i=0; i<6; i++)
							if (i != g_nIndexFormaAnterioara)
								if (nRandom) nRandom--;
								else
								{
									g_nIndexForma = i;
									g_nIndexCuloare = g_anPermutare[i];
									break;
								}
						break;
					}
			case 3:	{
						switch (Random(0, 3))
						{
							case 0:	{
										g_nIndexForma = g_nIndexFormaAnterioara;
										nRandom = Random(0, 4);
										for(i=0; i<6; i++)
											if (i != g_nIndexCuloareAnterioara)
												if (nRandom) nRandom--;
												else
												{
													g_nIndexCuloare = i;
													break;
												}
										break;
									}
							case 1:	{
										g_nIndexCuloare = g_nIndexCuloareAnterioara;
										nRandom = Random(0, 4);
										for(i=0; i<6; i++)
											if (i != g_nIndexFormaAnterioara)
												if (nRandom) nRandom--;
												else
												{
													g_nIndexForma = i;
													break;
												}
										break;
									}
							case 2:
							case 3:	{
										nRandom = Random(0, 4);
										for(i=0; i<6; i++)
											if (i != g_nIndexFormaAnterioara)
												if (nRandom) nRandom--;
												else
												{
													g_nIndexForma = i;
													break;
												}
										nRandom = Random(0, 4);
										for(i=0; i<6; i++)
											if (i != g_nIndexCuloareAnterioara)
												if (nRandom) nRandom--;
												else
												{
													g_nIndexCuloare = i;
													break;
												}
										break;
									}
						}

						break;
					}
		}
	}
}

function AfisarePrimul()
{
	g_cContext.clearRect(0, 0, 640, 416);
	DeseneazaForma(g_nIndexFormaAnterioara, g_nIndexCuloareAnterioara);
}

function AfisareExercitiu()
{
	g_cContext.clearRect(0, 0, 640, 416);
	DeseneazaForma(g_nIndexForma, g_nIndexCuloare);
}

function DeseneazaForma(l_nIndexForma, l_nIndexCuloare)
{
	g_cContext.fillStyle = cg_asCulori[l_nIndexCuloare];
	switch (l_nIndexForma)
	{
		case 0:	{
					g_cContext.beginPath();
					g_cContext.moveTo(285.5, 50.5);
					g_cContext.lineTo(355.5, 50.5);
					g_cContext.lineTo(355.5, 115.5);
					g_cContext.lineTo(420.5, 115.5);
					g_cContext.lineTo(420.5, 185.5);
					g_cContext.lineTo(355.5, 185.5);
					g_cContext.lineTo(355.5, 250.5);
					g_cContext.lineTo(285.5, 250.5);
					g_cContext.lineTo(285.5, 185.5);
					g_cContext.lineTo(220.5, 185.5);
					g_cContext.lineTo(220.5, 115.5);
					g_cContext.lineTo(285.5, 115.5);
					g_cContext.lineTo(285.5, 50.5);
					g_cContext.fill();
					break;
				}
		case 1:	{
					g_cContext.beginPath();
					g_cContext.moveTo(320.5, 50.5);
					g_cContext.lineTo(220.5, 250.5);
					g_cContext.lineTo(420.5, 250.5);
					g_cContext.lineTo(320.5, 50.5);
					g_cContext.fill();
					break;
				}
		case 2:	{
					g_cContext.fillRect(220.5, 50.5, 200, 200);
					break;
				}
		case 3:	{
					g_cContext.beginPath();
					g_cContext.arc(320, 150, 100, 0, 2 * Math.PI);
					g_cContext.fill();
					break;
				}
		case 4:	{
					g_cContext.beginPath();
					g_cContext.moveTo(279.5, 50.5);
					g_cContext.lineTo(320.5, 91.5);
					g_cContext.lineTo(361.5, 50.5);
					g_cContext.lineTo(361.5, 109.5);
					g_cContext.lineTo(420.5, 109.5);
					g_cContext.lineTo(379.5, 150.5);
					g_cContext.lineTo(420.5, 191.5);
					g_cContext.lineTo(361.5, 191.5);
					g_cContext.lineTo(361.5, 250.5);
					g_cContext.lineTo(320.5, 209.5);
					g_cContext.lineTo(279.5, 250.5);
					g_cContext.lineTo(279.5, 191.5);
					g_cContext.lineTo(220.5, 191.5);
					g_cContext.lineTo(261.5, 150.5);
					g_cContext.lineTo(220.5, 109.5);
					g_cContext.lineTo(279.5, 109.5);
					g_cContext.lineTo(279.5, 50.5);
					g_cContext.fill();
					break;
				}
		case 5:	{
					g_cContext.beginPath();
					g_cContext.moveTo(253.5, 50.5);
					g_cContext.lineTo(320.5, 117.5);
					g_cContext.lineTo(387.5, 50.5);
					g_cContext.lineTo(387.5, 184.5);
					g_cContext.lineTo(320.5, 251.5);
					g_cContext.lineTo(253.5, 184.5);
					g_cContext.lineTo(253.5, 50.5);
					g_cContext.fill();
					break;
				}
	}
}

function Urmatorul()
{
	g_nIndexExercitiu++;

	g_nZecimiDeSecundaIntreAfisari = 0;
	g_bGreseala = false;

	DeseneazaMeniu();
}

function ProcesareRezultate()
{
	var cDataCurenta = new Date();
	var sParam = "parametri=";
	var nData;
	var i;

	nData = cDataCurenta.getFullYear() % 100;
	if (nData < 10) sParam += "0";
	sParam += nData.toString();
	nData = cDataCurenta.getMonth() + 1;
	if (nData < 10) sParam += "0";
	sParam += nData.toString();
	nData = cDataCurenta.getDate();
	if (nData < 10) sParam += "0";
	sParam += nData.toString();
	nData = cDataCurenta.getHours();
	if (nData < 10) sParam += "0";
	sParam += nData.toString();
	nData = cDataCurenta.getMinutes();
	if (nData < 10) sParam += "0";
	sParam += nData.toString();

	sParam += ReprezentareHexa(5);   // ID joc
	sParam += ReprezentareHexa(g_nSubtip);
	sParam += ReprezentareHexa(g_nDificultate);
	sParam += ReprezentareHexa(g_nIndexExercitiu);
	sParam += ReprezentareHexa(g_nRaspunsuriCorecte);
	sParam += ReprezentareHexa(Math.floor(g_nCelMaiRapidRaspuns / 256)) + ReprezentareHexa(g_nCelMaiRapidRaspuns % 256);
	sParam += ReprezentareHexa(Math.floor(g_nCelMaiLentRaspuns / 256)) + ReprezentareHexa(g_nCelMaiLentRaspuns % 256);
	sParam += ReprezentareHexa(Math.floor(g_nTimpTotal / 256)) + ReprezentareHexa(g_nTimpTotal % 256);
	sParam += ReprezentareHexa(Math.floor(g_nScor / 256)) + ReprezentareHexa(g_nScor % 256);

	document.getElementById("se_incarca").style.visibility = "visible";
	document.getElementById("se_incarca").style.display = "inline";

	g_cXMLHTTP.open("POST", AJAX_URL, true);
	g_cXMLHTTP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	g_cXMLHTTP.send(sParam);
}

function ReprezentareHexa(l_nOctet)
{
	return (Math.floor(l_nOctet / 16)).toString(16) + (l_nOctet % 16).toString(16);
}

function MesajDeLaServer()
{
	if ((g_cXMLHTTP.readyState == 4) && (g_cXMLHTTP.status == 200))
	{
		document.getElementById("se_incarca").style.visibility = "hidden";
		document.getElementById("se_incarca").style.display = "none";
		if (g_nStare == 4) DesenareGrafic();
		document.getElementById("debug").innerHTML = g_cXMLHTTP.responseText;
	}
}

function EvenimentTastatura(eveniment)
{
	switch (g_nStare)
	{
		case 1:	{
					switch (eveniment.keyCode)
					{
						case 13:	{
										StartJoc();
										break;
									}
						case 37:	{
										if (g_nDificultate > 1) g_nDificultate--;
										AfisareBaraDificultate();
										break;
									}
						case 39:	{
										if (g_nDificultate < 3) g_nDificultate++;
										AfisareBaraDificultate();
										break;
									}
					}
					break;
				}
		case 2:	{
					switch (eveniment.keyCode)
					{
						case 37:	{
										if (g_nIndexPaginaInstructiuni == 0) PaginaInitiala();
										else
										{
											g_nIndexPaginaInstructiuni--;
											AfisareImagine(IMG_INSTRUCTIUNI + g_nIndexPaginaInstructiuni, 0, 0);
										}

										break;
									}
						case 39:	{
										if (g_nIndexPaginaInstructiuni == g_nPaginiInstructiuni - 1) PaginaInitiala();
										else
										{
											g_nIndexPaginaInstructiuni++;
											AfisareImagine(IMG_INSTRUCTIUNI + g_nIndexPaginaInstructiuni, 0, 0);
										}

										break;
									}
					}
					break;
				}
		case 3:	{
					break;
				}
		case 4:	{
					break;
				}
	}
}

function EvenimentMiscareMouse(eveniment)
{
	if (eveniment.offsetX == null)
	{
		g_nMouseX = eveniment.layerX - g_cCanvas.offsetLeft;
		g_nMouseY = eveniment.layerY - g_cCanvas.offsetTop;
	}
	else
	{
		g_nMouseX = eveniment.offsetX;
		g_nMouseY = eveniment.offsetY;
	}

	switch (g_nStare)
	{
		case 1:	{
					if (g_bMouseDrag)
					{
						if (g_bAjustareDificultate)
						{
							if (g_nMouseX < 258) g_nDificultate = 1;
							else g_nDificultate = Math.floor((g_nMouseX - 258) / 42) + 1;
							if (g_nDificultate > 3) g_nDificultate = 3;
							AfisareBaraDificultate();
						}
					}
					else
					{
						if (g_cButonStart.Deasupra())
						{
							if (g_cButonStart.nStare == 0)
							{
								g_cCanvas.style.cursor = "pointer";
								g_cButonStart.Afiseaza(1);
							}
						}
						else
						{
							if (g_cButonStart.nStare != 0)
							{
								g_cCanvas.style.cursor = "default";
								g_cButonStart.Afiseaza(0);
							}
						}

						if (g_cButonInstructiuni.Deasupra())
						{
							if (g_cButonInstructiuni.nStare == 0)
							{
								g_cCanvas.style.cursor = "pointer";
								g_cButonInstructiuni.Afiseaza(1);
							}
						}
						else
						{
							if (g_cButonInstructiuni.nStare != 0)
							{
								g_cCanvas.style.cursor = "default";
								g_cButonInstructiuni.Afiseaza(0);
							}
						}
					}
					break;
				}
		case 2:	{
					if (g_cButonStart2.Deasupra())
					{
						if (g_cButonStart2.nStare == 0)
						{
							g_cCanvas.style.cursor = "pointer";
							g_cButonStart2.Afiseaza(1);
						}
					}
					else
					{
						if (g_cButonStart2.nStare != 0)
						{
							g_cCanvas.style.cursor = "default";
							g_cButonStart2.Afiseaza(0);
						}
					}

					if (g_cButonStinga.Deasupra())
					{
						if (g_cButonStinga.nStare == 0)
						{
							g_cCanvas.style.cursor = "pointer";
							g_cButonStinga.Afiseaza(1);
						}
					}
					else
					{
						if (g_cButonStinga.nStare != 0)
						{
							g_cCanvas.style.cursor = "default";
							g_cButonStinga.Afiseaza(0);
						}
					}

					if (g_cButonDreapta.Deasupra())
					{
						if (g_cButonDreapta.nStare == 0)
						{
							g_cCanvas.style.cursor = "pointer";
							g_cButonDreapta.Afiseaza(1);
						}
					}
					else
					{
						if (g_cButonDreapta.nStare != 0)
						{
							g_cCanvas.style.cursor = "default";
							g_cButonDreapta.Afiseaza(0);
						}
					}

					break;
				}
		case 3:	{
					if (g_cButonReset.Deasupra())
					{
						if (g_cButonReset.nStare == 0)
						{
							g_cCanvas.style.cursor = "pointer";
							g_cButonReset.Afiseaza(1);
						}
					}
					else
					{
						if (g_cButonReset.nStare != 0)
						{
							g_cCanvas.style.cursor = "default";
							g_cButonReset.Afiseaza(0);
						}
					}

					if (g_nZecimiDeSecundaIntreAfisari > 6)
					{
						if (g_cButonIdentic.Deasupra())
						{
							if (g_cButonIdentic.nStare == 0)
							{
								g_cCanvas.style.cursor = "pointer";
								g_cButonIdentic.Afiseaza(1);
							}
						}
						else
						{
							if (g_cButonIdentic.nStare != 0)
							{
								g_cCanvas.style.cursor = "default";
								g_cButonIdentic.Afiseaza(0);
							}
						}

						if (g_cButonDiferit.Deasupra())
						{
							if (g_cButonDiferit.nStare == 0)
							{
								g_cCanvas.style.cursor = "pointer";
								g_cButonDiferit.Afiseaza(1);
							}
						}
						else
						{
							if (g_cButonDiferit.nStare != 0)
							{
								g_cCanvas.style.cursor = "default";
								g_cButonDiferit.Afiseaza(0);
							}
						}
					}

					break;
				}
		case 4:	{
					if (g_cButonJocNou.Deasupra())
					{
						if (g_cButonJocNou.nStare == 0)
						{
							g_cCanvas.style.cursor = "pointer";
							g_cButonJocNou.Afiseaza(1);
						}
					}
					else
					{
						if (g_cButonJocNou.nStare != 0)
						{
							g_cCanvas.style.cursor = "default";
							g_cButonJocNou.Afiseaza(0);
						}
					}

					break;
				}
	}	
}

function EvenimentMouseApasat(eveniment)
{
	var nTimp, nIndex;
	var x, y;
	var i;

	if (eveniment.button == 0)
	{
		g_bMouseDrag = true;

		switch (g_nStare)
		{
			case 1:	{
						if (g_cButonStart.Deasupra())
						{
							g_cButonStart.Afiseaza(2);
							RedareSunet(0);
						}
						else
							if (g_cButonInstructiuni.Deasupra())
							{
								g_cButonInstructiuni.Afiseaza(2);
								RedareSunet(0);
							}
							else
								if (DeasupraBaraDificultate())
								{
									if (g_nMouseX < 258) g_nDificultate = 1;
									else g_nDificultate = Math.floor((g_nMouseX - 258) / 42) + 1;
									if (g_nDificultate > 3) g_nDificultate = 3;
									AfisareBaraDificultate();
									g_bAjustareDificultate = true;
								}
						break;
					}
			case 2:	{
						if (g_cButonStart2.Deasupra())
						{
							g_cButonStart2.Afiseaza(2);
							RedareSunet(0);
						}

						if (g_cButonStinga.Deasupra())
						{
							g_cButonStinga.Afiseaza(2);
							RedareSunet(0);
						}

						if (g_cButonDreapta.Deasupra())
						{
							g_cButonDreapta.Afiseaza(2);
							RedareSunet(0);
						}

						break;
					}
			case 3:	{
						if (g_cButonReset.Deasupra())
						{
							g_cButonReset.Afiseaza(2);
							RedareSunet(0);
						}

						if (g_nZecimiDeSecundaIntreAfisari > 6)
						{
							if (g_cButonIdentic.Deasupra())
							{
								g_cButonIdentic.Afiseaza(2);
								//RedareSunet(0);
							}

							if (g_cButonDiferit.Deasupra())
							{
								g_cButonDiferit.Afiseaza(2);
								//RedareSunet(0);
							}
						}

						break;
					}
			case 4:	{
						if (g_cButonJocNou.Deasupra())
						{
							g_cButonJocNou.Afiseaza(2);
							RedareSunet(0);
						}
						break;
					}
		}	
	}
}

function EvenimentMouseRidicat(eveniment)
{
	if (eveniment.button == 0)
	{
		g_bMouseDrag = false;

		switch (g_nStare)
		{
			case 1:	{
						g_bAjustareDificultate = false;

						if (g_cButonStart.nStare == 2)
						{
							//RedareSunet(0);
							g_cButonStart.nStare = 1;
							StartJoc();
						}
						else
							if (g_cButonStart.Deasupra()) g_cButonStart.nStare = 1;
							else g_cButonStart.nStare = 0;

						if (g_cButonInstructiuni.nStare == 2)
						{
							//RedareSunet(0);
							g_cButonInstructiuni.nStare = 1;
							g_nIndexPaginaInstructiuni = 0;
							SchimbaStarea(2);
							AfisareStarea2();
						}
						else
							if (g_cButonInstructiuni.Deasupra()) g_cButonInstructiuni.nStare = 1;
							else g_cButonInstructiuni.nStare = 0;

						break;
					}
			case 2:	{
						if (g_cButonStart2.nStare == 2)
						{
							//RedareSunet(0);
							g_cButonStart2.nStare = 1;
							StartJoc();
						}
						else
							if (g_cButonStart2.Deasupra()) g_cButonStart2.nStare = 1;
							else g_cButonStart2.nStare = 0;

						if (g_cButonStinga.nStare == 2)
						{
							//RedareSunet(0);
							g_cButonStinga.nStare = 1;
							if (g_nIndexPaginaInstructiuni == 0) PaginaInitiala();
							else
							{
								g_nIndexPaginaInstructiuni--;
								AfisareImagine(IMG_INSTRUCTIUNI + g_nIndexPaginaInstructiuni, 0, 0);
							}
						}
						else
							if (g_cButonStinga.Deasupra()) g_cButonStinga.nStare = 1;
							else g_cButonStinga.nStare = 0;

						if (g_cButonDreapta.nStare == 2)
						{
							//RedareSunet(0);
							g_cButonDreapta.nStare = 1;
							if (g_nIndexPaginaInstructiuni == g_nPaginiInstructiuni - 1) PaginaInitiala();
							else
							{
								g_nIndexPaginaInstructiuni++;
								AfisareImagine(IMG_INSTRUCTIUNI + g_nIndexPaginaInstructiuni, 0, 0);
							}
						}
						else
							if (g_cButonDreapta.Deasupra()) g_cButonDreapta.nStare = 1;
							else g_cButonDreapta.nStare = 0;

						break;
					}
			case 3:	{
						if (g_cButonReset.nStare == 2)
						{
							//RedareSunet(0);
							window.clearInterval(g_nTimerID);
							PaginaInitiala();
						}
						else
							if (g_cButonReset.Deasupra()) g_cButonReset.nStare = 1;
							else g_cButonReset.nStare = 0;

						if (g_nZecimiDeSecundaIntreAfisari > 6)
						{
							if (g_cButonIdentic.nStare == 2)
							{
								if (g_bIdentic)
								{
									RedareSunet(1);
									g_nRaspunsuriCorecte++;
									nTimp = g_nZecimiDeSecundaExercitiu;
									g_nTimpTotal += nTimp;
									if (g_nCelMaiRapidRaspuns > nTimp) g_nCelMaiRapidRaspuns = nTimp;
									if (g_nCelMaiLentRaspuns < nTimp) g_nCelMaiLentRaspuns = nTimp;
									Urmatorul();
								}
								else
								{
									RedareSunet(2);
									Urmatorul();
								}
							}
							else
								if (g_cButonIdentic.Deasupra()) g_cButonIdentic.nStare = 1;
								else g_cButonIdentic.nStare = 0;

							if (g_cButonDiferit.nStare == 2)
							{
								if (g_bIdentic)
								{
									RedareSunet(2);
									Urmatorul();
								}
								else
								{
									RedareSunet(1);
									g_nRaspunsuriCorecte++;
									nTimp = g_nZecimiDeSecundaExercitiu;
									g_nTimpTotal += nTimp;
									if (g_nCelMaiRapidRaspuns > nTimp) g_nCelMaiRapidRaspuns = nTimp;
									if (g_nCelMaiLentRaspuns < nTimp) g_nCelMaiLentRaspuns = nTimp;
									Urmatorul();
								}
							}
							else
								if (g_cButonDiferit.Deasupra()) g_cButonDiferit.nStare = 1;
								else g_cButonDiferit.nStare = 0;
						}

						break;
					}
			case 4:	{
						if (g_cButonJocNou.nStare == 2)
						{
							//RedareSunet(0);
							document.getElementById("se_incarca").style.visibility = "hidden";
							document.getElementById("se_incarca").style.display = "none";
							PaginaInitiala();
						}
						else
							if (g_cButonJocNou.Deasupra()) g_cButonJocNou.nStare = 1;
							else g_cButonJocNou.nStare = 0;

						break;
					}
		}
	}
}

function EvenimentImagineIncarcata()
{
	g_nImaginiIncarcate++;
	g_cContext.fillStyle = "#00c000";
	g_cContext.fillRect(220.5, 233.5, 200 * g_nImaginiIncarcate / g_nImaginiDeIncarcat, 14);
	if (g_nImaginiIncarcate == g_nImaginiDeIncarcat)
	{
		g_cContext.clearRect(216, 229, 209, 23);

		g_cButonStart = new Buton(TEXT_BUTON_START, 230, 400, IMG_BUTON_TEXT);
		g_cButonInstructiuni = new Buton(TEXT_BUTON_INSTRUCTIUNI, 410, 400, IMG_BUTON_TEXT);
		g_cButonStart2 = new Buton(TEXT_BUTON_START, 320, 450, IMG_BUTON_TEXT);
		g_cButonStinga = new Buton("", 200, 450, IMG_BUTON_STINGA);
		g_cButonDreapta = new Buton("", 440, 450, IMG_BUTON_DREAPTA);
		g_cButonJocNou = new Buton(TEXT_BUTON_JOC_NOU, 540, 120, IMG_BUTON_TEXT);
		g_cButonReset = new Buton(TEXT_BUTON_RESET, 556, 448, IMG_BUTON_TEXT);
		g_cButonIdentic = new Buton(TEXT_BUTON_IDENTIC, 236, 318, IMG_BUTON_TEXT);
		g_cButonDiferit = new Buton(TEXT_BUTON_DIFERIT, 404, 318, IMG_BUTON_TEXT);

		g_nDificultate = 1;
		PaginaInitiala();
	}
	else window.setTimeout(IncarcaImagineaUrmatoare, 0);
}

function IncarcaImagineaUrmatoare()
{
	g_acImagini[g_nImaginiIncarcate].src = g_asFisiereImagini[g_nImaginiIncarcate];
}

function DeasupraBaraDificultate()
{
	return (g_nMouseX > 258) && (g_nMouseX < 382) && (g_nMouseY > 180) && (g_nMouseY < 220);
}

function AfisareBaraDificultate()
{
	g_cContext.clearRect(210, 143, 320, 30);

	g_cContext.font = "24px Arial";
	g_cContext.textBaseline = "bottom";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#000000";

	g_cContext.fillText(TEXT_NIVEL_DIFICULTATE + ": " + g_nDificultate.toString(), 210, 170);
	g_cContext.fillStyle = "#00c000";
	for(var i=0; i<g_nDificultate; i++) g_cContext.fillRect(258 + i * 42, 180, 40, 40);
	g_cContext.fillStyle = "#cccccc";
	for(var i=g_nDificultate; i<3; i++) g_cContext.fillRect(258 + i * 42, 180, 40, 40);
}

function Cronometru()
{
	if (g_nZecimiDeSecundaIntreAfisari <= 6)
	{
		if (g_nZecimiDeSecundaIntreAfisari == 0)
		{
			g_cContext.clearRect(219.5, 49.5, 202, 202);
			g_cContext.clearRect(163.5, 250.5, 314, 116);
			g_cCanvas.style.cursor = "default";
		}
		if (g_nZecimiDeSecundaIntreAfisari == 6)
		{
			g_nZecimiDeSecundaExercitiu = 0;
			DeseneazaMeniu();
			GenerareExercitiu();
			AfisareExercitiu();
			g_cButonIdentic.Afiseaza(0);
			g_cButonDiferit.Afiseaza(0);
			if (g_cButonIdentic.Deasupra() || g_cButonDiferit.Deasupra()) g_cCanvas.style.cursor = "pointer";
		}
		g_nZecimiDeSecundaIntreAfisari++;
	}
	else
	{
		g_nZecimiDeSecundaExercitiu++;
		g_nZecimiDeSecunda--;
		if (g_nZecimiDeSecunda % 10 == 0)
		{
			g_nSecundeRamase--;
			if (g_nSecundeRamase <= 10) RedareSunet(3);
			if (g_nSecundeRamase == 0)
			{
				window.clearInterval(g_nTimerID);
				SchimbaStarea(4);
				AfisareRezultate();
				g_nTimpTotalAnterior = g_nTimpTotal;
				g_nRaspunsuriCorecteAnterior = g_nRaspunsuriCorecte;
				g_nDificultateAnterioara = g_nDificultate;
				ProcesareRezultate();
			}
			else DeseneazaMeniu();
		}
	}
}

function DeseneazaMeniu()
{
	var sText;
	var nMinute, nSecunde;

	AfisareImagine(IMG_MENIU, 0, 416);

	g_cContext.font = "18px Arial";
	g_cContext.textBaseline = "middle";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#f0f0f0";
	g_cContext.fillText(TEXT_NIVEL_DIFICULTATE + " :  " + g_nDificultate.toString(), 10, 435);
	sText = TEXT_EXERCITIUL + " " + (g_nIndexExercitiu + 1).toString();
	g_cContext.fillText(sText, 10, 461);

	g_cContext.lineWidth = 1;
	g_cContext.strokeStyle = "#f0f0f0";
	g_cContext.strokeRect(345.5, 424.5, 128, 48);
	g_cContext.strokeRect(347.5, 426.5, 124, 44);

	nMinute = Math.floor(g_nSecundeRamase / 60);
	nSecunde = g_nSecundeRamase % 60;
	if (nMinute < 10) sText = "0";
	else sText = "";
	sText += nMinute.toString();
	sText += ":";
	if (nSecunde < 10) sText += "0";
	sText += nSecunde.toString();

	g_cContext.font = "36px Courier New";
	g_cContext.textBaseline = "middle";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#f0f0f0";
	g_cContext.fillText(sText, 354, 448);

	g_cButonReset.Afiseaza(0);
}

function Buton(text, x, y, l_nIndexImagine)
{
	var w, h;

	w = g_acImagini[l_nIndexImagine].width;
	h = g_acImagini[l_nIndexImagine].height;

	this.sText = text;
	this.nImagine = l_nIndexImagine;
	this.nStare = 0;   // 0 = inactiv, 1 = mouse deasupra, 2 = apasat
	this.x = x;
	this.y = y;
	this.x1 = x - Math.floor(w / 2);
	this.y1 = y - Math.floor(h / 2);
	this.x2 = this.x1 + w;
	this.y2 = this.y1 + h;
	this.Deasupra = _buton_Deasupra;
	this.Afiseaza = _buton_Afiseaza;
}

function _buton_Deasupra()
{
	return (g_nMouseX > this.x1) && (g_nMouseX < this.x2) && (g_nMouseY > this.y1) && (g_nMouseY < this.y2);
}

function _buton_Afiseaza(l_nStare)
{
	this.nStare = l_nStare;
	AfisareImagine05(this.nImagine + l_nStare, this.x1, this.y1);
	g_cContext.font = "bold 18px Arial";
	g_cContext.textBaseline = "middle";
	g_cContext.textAlign = "center";
	g_cContext.fillStyle = "#ffe800";
	g_cContext.fillText(this.sText, this.x, this.y);
}

function Random(a, b)
{
	return Math.floor((Math.random() * (b - a + 1)) + a);
}

function RedareSunet(i)
{
	if (g_bSuportSunet) g_acSunete[i].play();
}

function AfisareRezultate()
{
	var sText;
	var nMinute, nSecunde, nTimpTotal;
	var nProcent;
	var i;

	g_cContext.clearRect(0, 0, 640, 480);

	g_cContext.fillStyle = "#ffffbb";
	g_cContext.fillRect(19.5, 19.5, 420, 200);

	g_cContext.lineWidth = 1;
	g_cContext.strokeStyle = "#aaaa44";
	g_cContext.strokeRect(16.5, 16.5, 426, 206);
	g_cContext.strokeStyle = "#000000";
	g_cContext.strokeRect(15.5, 15.5, 428, 208);
	g_cContext.strokeRect(17.5, 17.5, 424, 204);
	for(i=0; i<10; i++)
	{
		g_cContext.strokeRect(19.5, 19.5 + 20 * i, 220, 20);
		g_cContext.strokeRect(239.5, 19.5 + 20 * i, 200, 20);
	}

	g_cContext.font = "14px Arial";
	g_cContext.textBaseline = "middle";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#000000";

	g_cContext.fillText(TEXT_TABEL_JOC, 24, 30);
	g_cContext.fillText(TEXT_TABEL_DIFICULTATE, 24, 50);
	g_cContext.fillText(TEXT_TABEL_NUMAR_EXERCITII, 24, 70);
	g_cContext.fillText(TEXT_TABEL_RASPUNSURI_CORECTE, 24, 90);
	g_cContext.fillText(TEXT_TABEL_PROCENT, 24, 110);
	g_cContext.fillText(TEXT_TABEL_CEL_MAI_RAPID, 24, 130);
	g_cContext.fillText(TEXT_TABEL_CEL_MAI_LENT, 24, 150);
	g_cContext.fillText(TEXT_TABEL_TIMP_MEDIU, 24, 170);
	g_cContext.fillText(TEXT_TABEL_EVOLUTIE, 24, 190);
	g_cContext.fillText(TEXT_TABEL_SCOR, 24, 210);

	g_cContext.font = "bold 14px Arial";
	g_cContext.textAlign = "center";

	g_cContext.fillText(TEXT_DENUMIRE_JOC_005, 340, 30);

	g_cContext.textAlign = "right";

	nProcent = Math.floor(100 * g_nRaspunsuriCorecte / g_nIndexExercitiu);
	if ((g_nRaspunsuriCorecteAnterior == 0) || (g_nRaspunsuriCorecte == 0)) nEvolutie = 8888888;
	else
		if ((g_nTimpTotalAnterior == -1) || (g_nDificultateAnterioara != g_nDificultate)) nEvolutie = 0;
		else
			if (g_nTimpTotalAnterior / g_nRaspunsuriCorecteAnterior < g_nTimpTotal / g_nRaspunsuriCorecte) nEvolutie = Math.ceil(100 * g_nTimpTotalAnterior * g_nRaspunsuriCorecte / g_nRaspunsuriCorecteAnterior / g_nTimpTotal - 100);
			else nEvolutie = Math.floor(100 * g_nTimpTotalAnterior * g_nRaspunsuriCorecte / g_nRaspunsuriCorecteAnterior / g_nTimpTotal - 100);

	sText = g_nDificultate.toString();
	g_cContext.fillText(sText, 314, 50);
	sText = g_nIndexExercitiu.toString();
	g_cContext.fillText(sText, 314, 70);
	if (nProcent < 50) g_cContext.fillStyle = "#cc0000";
	else
		if (nProcent >= 80) g_cContext.fillStyle = "#00aa00";
	sText = g_nRaspunsuriCorecte.toString();
	g_cContext.fillText(sText, 314, 90);
	sText = nProcent.toString();
	g_cContext.fillText(sText, 314, 110);
	g_cContext.fillStyle = "#00aa00";
	if (g_nRaspunsuriCorecte == 0) sText = "-";
	else sText = (Math.floor(g_nCelMaiRapidRaspuns / 10)).toString() + "." + (g_nCelMaiRapidRaspuns % 10).toString();
	g_cContext.fillText(sText, 314, 130);
	g_cContext.fillStyle = "#cc0000";
	if (g_nRaspunsuriCorecte == 0) sText = "-";
	else sText = (Math.floor(g_nCelMaiLentRaspuns / 10)).toString() + "." + (g_nCelMaiLentRaspuns % 10).toString();
	g_cContext.fillText(sText, 314, 150);
	g_cContext.fillStyle = "#000000";
	if (g_nRaspunsuriCorecte == 0) sText = "-";
	else
	{
		nTimpTotal = 100 * g_nTimpTotal / g_nRaspunsuriCorecte;
		sText = (Math.floor(nTimpTotal / 1000)).toString() + "." + (Math.floor(nTimpTotal) % 1000).toString();
	}
	g_cContext.fillText(sText, 314, 170);
	if (nEvolutie == 8888888) sText = "-";
	else
		if (nEvolutie < 0)
		{
			g_cContext.fillStyle = "#cc0000";
			sText = nEvolutie.toString();
		}
		else
			if (nEvolutie > 0)
			{
				g_cContext.fillStyle = "#00aa00";
				sText = "+" + nEvolutie.toString();
			}
			else sText = "0";
	g_cContext.fillText(sText, 314, 190);
	g_cContext.fillStyle = "#000000";
	sText = "-";
	g_cContext.fillText(sText, 314, 210);

	g_cContext.font = "14px Arial";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#000000";

	g_cContext.fillText("%", 318, 110);
	g_cContext.fillText(TEXT_TABEL_SECUNDE, 318, 130);
	g_cContext.fillText(TEXT_TABEL_SECUNDE, 318, 150);
	g_cContext.fillText(TEXT_TABEL_SECUNDE, 318, 170);
	g_cContext.fillText("%", 318, 190);

	g_cButonJocNou.Afiseaza(0);
}

function AfisareStarea1()
{
	AfisareBaraDificultate();
	g_cButonStart.Afiseaza(0);
	g_cButonInstructiuni.Afiseaza(0);
}

function AfisareStarea2()
{
	AfisareImagine(IMG_INSTRUCTIUNI, 0, 0);
	AfisareImagine(IMG_MENIU, 0, 416);
	g_cButonStart2.Afiseaza(0);
	g_cButonStinga.Afiseaza(0);
	g_cButonDreapta.Afiseaza(0);
}

function AfisareImagine(l_nIndex, x, y)
{
	g_cContext.drawImage(g_acImagini[l_nIndex], x, y);
}

function AfisareImagine05(l_nIndex, x, y)
{
	g_cContext.drawImage(g_acImagini[l_nIndex], x + 0.5, y + 0.5);
}

function SchimbaStarea(l_nStare)
{
	g_nStare = l_nStare;
	g_cCanvas.style.cursor = "default";

	g_cButonStart.nStare = 0;
	g_cButonInstructiuni.nStare = 0;
	g_cButonStart2.nStare = 0;
	g_cButonStinga.nStare = 0;
	g_cButonDreapta.nStare = 0;
	g_cButonJocNou.nStare = 0;
	g_cButonReset.nStare = 0;
}

function DesenareGrafic()
{
	g_cContext.lineWidth = 1;
	g_cContext.strokeStyle = "#000000";
	g_cContext.fillStyle = "#000000";
	g_cContext.beginPath();
	g_cContext.moveTo(19.5, 259.5);
	g_cContext.lineTo(19.5, 459.5);
	g_cContext.lineTo(619.5, 459.5);
	g_cContext.stroke();
	g_cContext.beginPath();
	g_cContext.moveTo(19.5, 259.5);
	g_cContext.lineTo(16.5, 265.5);
	g_cContext.lineTo(22.5, 265.5);
	g_cContext.lineTo(19.5, 259.5);
	g_cContext.fill();
	g_cContext.beginPath();
	g_cContext.moveTo(619.5, 459.5);
	g_cContext.lineTo(613.5, 456.5);
	g_cContext.lineTo(613.5, 462.5);
	g_cContext.lineTo(619.5, 459.5);
	g_cContext.fill();

	g_cContext.lineWidth = 3;
	g_cContext.strokeStyle = "#00aa00";
	g_cContext.beginPath();
	g_cContext.moveTo(379.5, 239.5);
	g_cContext.lineTo(459.5, 239.5);
	g_cContext.stroke();
	g_cContext.strokeStyle = "#0000cc";
	g_cContext.beginPath();
	g_cContext.moveTo(379.5, 259.5);
	g_cContext.lineTo(459.5, 259.5);
	g_cContext.stroke();

	g_cContext.font = "14px Arial";
	g_cContext.textBaseline = "middle";
	g_cContext.textAlign = "left";
	g_cContext.fillStyle = "#000000";
	g_cContext.fillText(TEXT_GRAFIC_RASPUNSURI_CORECTE, 470, 238);
	g_cContext.fillText(TEXT_GRAFIC_TIMP_MEDIU, 470, 258);
}

//document.getElementById("debug").innerHTML = "info";
