<?php

    function phpWrapperFromFile($filename)
	{
		ob_start();

		if (file_exists($filename) && !is_dir($filename))
		{
			include($filename);
		}

		// nacte to z outputu
		$obsah = ob_get_clean();
		return $obsah;
	}

    $page = @$_REQUEST["page"];
    $subpage = @$_REQUEST["subpage"];

    // default je uvod
    if($page == "")
        $page = "uvod";

    //echo "page je : $page ";

    if($page == "uvod")
        $filename = "obsah/uvod.inc.php";

    elseif($page == "kontakt")
        $filename = "obsah/kontakt.inc.php";

    elseif($page == "login")
        $filename = "obsah/loginForm.inc.php";
    else
        $filename = "obsah/404.inc.php";

    $obsah = phpWrapperFromFile($filename);
    //echo $obsah;

//pages
$pages = array();
$pages["uvod"] = "Úvod";
$pages ["kontakt"] = "Kontakt";
$pages ["login"] = "Login";



//menu

    $menu="";
$menu .="<ul class='nav navbar-nav'>";
if($pages != null)
    foreach($pages as $key => $title)
    {
        if($page == $key) $active_pom = "class='active'";
        else $active_pom = "";
        $menu .= "<li $active_pom><a href='index.php?page=$key'>$title</a></li>";
    }
$menu .="</ul>";


//

    // nacist twig - kopie z dokumentace

	require_once 'obsah/twig/lib/Twig/Autoloader.php';
	Twig_Autoloader::register();
	// cesta k adresari se sablonama - od index.php
	$loader = new Twig_Loader_Filesystem('sablony');
	$twig = new Twig_Environment($loader); // takhle je to bez cache
	// nacist danou sablonu z adresare
	$template = $twig->loadTemplate('sablona1.htm');

	// render vrati data pro vypis nebo display je vypise
	// v poli jsou data pro vlozeni do sablony
	$template_params = array();
	$template_params["obsah"] = $obsah;
    $template_params["menu"] = $menu;
    $template_params["nadpis1"] = "Konference";
    $template_params["prihlasitSe"] = "Přihlásit se";
	echo $template->render($template_params);
?>
