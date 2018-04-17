<?php

// set the level of error reporting
if (file_exists('export/_error_reporting.all') || file_exists('export/_error_reporting.shop')) {
    error_reporting(E_ALL & ~E_NOTICE);
    //error_reporting(-1); // Development value
} else {
    error_reporting(0);
}


### Dieses Script immer im utf-8-Modus speichern!

include('includes/configure.php');
include('includes/configure_kennzeichen.php');

### DIREKTAUFRUF:
# http://shoptest.kroschke.de.dd26430.kasserver.com/schild_dyn.php?picinfo=euro-schwarz-520-norm-ABC-AV-123--
# http://shoptest.kroschke.de.dd26430.kasserver.com/schild_dyn.php?picinfo=motorrad-schwarz-180-eng-ABC-AV-123--

$loggen = 'ja';
$loggen = '';

$Chars = array();

$letters = 0;


if (!empty($_REQUEST['picinfo'])) {

    $filename = umlaute($_REQUEST['picinfo']);

    // BOF: Neu: Prüfen ob File bereits existiert, auch große Bilder werden nun geschrieben
    if (file_exists(DIR_FS_DOCUMENT_ROOT . 'kennzeichen_big/' . $filename . '.png')) {
        header("Content-Type: image/png");
        header('Content-Length: ' . filesize(DIR_FS_DOCUMENT_ROOT . 'kennzeichen_big/' . $filename . '.png'));
        echo readfile(DIR_FS_DOCUMENT_ROOT . 'kennzeichen_big/' . $filename . '.png');
        /*
        $data = "\n-------------------------------------------------\nZeitpunkt: ".date("Y-m-d H:i:s")."\n".DIR_FS_DOCUMENT_ROOT.'kennzeichen_big/'.$filename.'.png';
        $datei = fopen("shoplogs/ajaxpicload.log", 'a');
        fwrite($datei, "$data\n");
        fclose($datei);
        */
        exit;
    }
    // EOF: Neu: Prüfen ob File bereits existiert, auch große Bilder werden nun geschrieben


    $data = $_REQUEST['picinfo'] . "\n";
    $Picdata = explode('-', $_REQUEST['picinfo']);
    foreach ($Picdata as $key => $val) {
        $data .= "$key:$val\n";
        $data .= "$key:" . utf8_decode($val) . "\n";
        $Picdata[$key] = utf8_decode("$val");    ### Da es später irgendwie nicht klappt!
    }
    if ($loggen == 'ja') {
        $data = "\n-------------------------------------------------\nZeitpunkt: " . date("Y-m-d H:i:s") . "\n$data";
        $datei = fopen("shoplogs/ajaxpicneu.log", 'a');
        fwrite($datei, "$data\n");
        fclose($datei);
    }
}

$kennzeichenpic = $Kennzeichenpics[$Picdata[$pos_kennzeichen]];

$kennzeichen = $Picdata[$pos_kennzeichen];
$groesse = $Picdata[$pos_groesse];
$farbe = $Picdata[$pos_farbe];


# if (!empty($_REQUEST['font']))

    # $imagefile = 'images/schilder/'.$kennzeichen.$farbe.$groesse.'.png';
    $imagefile = DIR_FS_DOCUMENT_ROOT . DIR_WS_IMAGES . 'schilder/' . $kennzeichenpic . $farbe . $groesse . '.png';

    $image = new Imagick($imagefile);

    $imagesize = $image->getImageGeometry();
    $imagew = $imagesize['width'];
    $imageh = $imagesize['height'];


    ### ZEICHENFELD 1
    if (!empty($Picdata[$pos_chars1]) || $Picdata[$pos_chars1] == '0') {
        for ($i = 0; $i < strlen($Picdata[$pos_chars1]); $i++) {
            $val = $Picdata[$pos_chars1][$i];
            $char = $Picdata[$pos_chars1][$i];

            $char = checkchars(utf8_encode($char), 'char', $kennzeichen);
            if (!empty($char) || $char == '0') {
                $Chars[1][] = $char;
                if ($loggen == 'ja') {
                    $datei = fopen("shoplogs/ajaxpic.log", 'a');
                    fwrite($datei, "Char2: $char\n");
                    fclose($datei);
                }
                $letters++;
            }
        }
    }

    ### ZEICHENFELD 2
    if (!empty($Picdata[$pos_chars2])) {
        for ($i = 0; $i < strlen($Picdata[$pos_chars2]); $i++) {
            $char = strtolower($Picdata[$pos_chars2][$i]);
            $char = checkchars(utf8_encode($char), 'char', $kennzeichen);
            if (!empty($char)) {
                $Chars[2][] = $char;
                $letters++;
            }
        }
    }

    ### ZEICHENFELD 3
    if (!empty($Picdata[$pos_chars3]) || $Picdata[$pos_chars3] == '0') {
        for ($i = 0; $i < strlen($Picdata[$pos_chars3]); $i++) {
            $char = strtolower($Picdata[$pos_chars3][$i]);
            $char = checkchars(utf8_encode($char), 'num', $kennzeichen);
            if (!empty($char) || $char == '0') {
                $Chars[3][] = "$char";
                $letters++;
            }
        }
    }


    ### ZWEIZEILIG
    if ($groesse < $switch2zeilig) {
        $zweizeilig = 'ja';
    } else {
        $zweizeilig = 'nein';
    }

    ### SCHRIFTMODUS INITIALISIEREN:

#    if	   ($groesse == 255)
    if ($groesse < 340) {
        $schriftmode = 'engrad';
    } elseif ($Picdata[$pos_schrift] == 'eng') {
        $schriftmode = 'eng';
    } else {
        $schriftmode = 'norm';
    }
    $lverz = DIR_FS_DOCUMENT_ROOT . DIR_WS_IMAGES . 'schilder/' . $schriftmode;

    $Letters = array();


    ### BUCHSTABEN VON ZEICHENFELD 1 VORBEREITEN:
    if (!empty($Chars[1]) || $Chars[1] == '0') {
        foreach ($Chars[1] as $char) {
            $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_' . $char . '.png';
            $Letters[1][] = $letterfile;
        }
    }
    ### BUCHSTABEN VON ZEICHENFELD 2 VORBEREITEN:
    if (!empty($Chars[2])) {
        foreach ($Chars[2] as $char) {
            $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_' . $char . '.png';
            $Letters[2][] = $letterfile;
        }
    }
    ### BUCHSTABEN VON ZEICHENFELD 3 VORBEREITEN:
    if (!empty($Chars[3]) || $Chars[3] == '0') {
        foreach ($Chars[3] as $char) {
            $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_' . $char . '.png';
            $Letters[3][] = $letterfile;
        }
    }
    ### BUCHSTABEN FÜR HISTORISCHE VORBEREITEN:
    if (strpos($kennzeichen, 'historisch') !== false) {
        $char = 'h';
        $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_' . $char . '.png';
        $Letters['hist'] = $letterfile;
    }
    ### BUCHSTABEN FÜR EKENNZEICHEN VORBEREITEN:
    if (strpos($kennzeichen, 'ekennzeichen') !== false) {
        $char = 'e';
        $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_' . $char . '.png';
        $Letters['ekenn'] = $letterfile;
    }

    ### BUCHSTABEN IN SCHILD EINTRAGEN:

    ### EINZEILIGES SCHILD:
    if ($zweizeilig == 'nein') {
        $charblockw = 0;
        if (!empty($Chars[1])) {
            $charblockw += ((count($Chars[1]) * $Charwidth[$schriftmode]) + ((count($Chars[1]) - 1) * $Charleft[$schriftmode]['char']));
        }
        if (!empty($Chars[2])) {
            $charblockw += $Pos[$kennzeichen][$groesse]['bl2l'];
            $charblockw += ((count($Chars[2]) * $Charwidth[$schriftmode]) + ((count($Chars[2]) - 1) * $Charleft[$schriftmode]['char']));
        }
        if (!empty($Chars[3])) {
            $charblockw += $Pos[$kennzeichen][$groesse]['bl3l'];
            $charblockw += ((count($Chars[3]) * $Charwidth[$schriftmode]) + ((count($Chars[3]) - 1) * $Charleft[$schriftmode]['num']));
        }
        if (!empty($Letters['hist'])) {
            $charblockw += $Charleft[$schriftmode]['hist'];
            $charblockw += $Charwidth[$schriftmode];
        }
        if (!empty($Letters['ekenn'])) {
            $charblockw += $Charleft[$schriftmode]['ekenn'];
            $charblockw += $Charwidth[$schriftmode];
        }


        $leftplus = (int)(($Pos[$kennzeichen][$groesse]['z1max'] - $charblockw) / 2);

        $lettertop_dyn = $Pos[$kennzeichen][$groesse]['z1t'];
        $leftpos = ($Pos[$kennzeichen][$groesse]['z1l'] + $leftplus);

        $datastring = "kennzeichen: $kennzeichen | charblockw: $charblockw | leftplus: $leftplus\n";

        ### BLOCK 1 ERZEUGEN:
        if (!empty($Letters[1])) {
            $datastring .= "Block1\n";
            $lcount = 0;
            foreach ($Letters[1] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['char'] . "\n";
                if ($lcount > 0) {
                    $leftpos += $Charleft[$schriftmode]['char'];
                }
                $datastring .= "$leftpos $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos, $lettertop_dyn);
                $leftpos += $Charwidth[$schriftmode];
                $lcount++;
            }
        }
        ### BLOCK 2 ERZEUGEN:
        if (!empty($Letters[2])) {
            $datastring .= "Block2\n";
            $leftpos += $Pos[$kennzeichen][$groesse]['bl2l'];
            $datastring .= "leftposplus " . $Pos[$kennzeichen][$groesse]['bl2l'] . "\n";
            $lcount = 0;
            foreach ($Letters[2] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['char'] . "\n";
                if ($lcount > 0) {
                    $leftpos += $Charleft[$schriftmode]['char'];
                }
                $datastring .= "$leftpos $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos, $lettertop_dyn);
                $leftpos += $Charwidth[$schriftmode];
                $lcount++;
            }
        }
        ### BLOCK 3 ERZEUGEN:
        if (!empty($Letters[3])) {
            $datastring .= "Block3\n";
            $leftpos += $Pos[$kennzeichen][$groesse]['bl3l'];
            $datastring .= "leftposplus " . $Pos[$kennzeichen][$groesse]['bl3l'] . "\n";
            $lcount = 0;
            foreach ($Letters[3] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['num'] . "\n";
                if ($lcount > 0) {
                    $leftpos += $Charleft[$schriftmode]['num'];
                }
                $datastring .= "$leftpos $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos, $lettertop_dyn);
                $leftpos += $Charwidth[$schriftmode];
                $lcount++;
            }
        }

        ### HISTORISCH ANFÜGEN:
        if (!empty($Letters['hist'])) {
            $datastring .= "Hist\n";
            if (empty($Letters[1]) && empty($Letters[2]) && empty($Letters[3])) {
                if ($schriftmode == 'norm') {
                    $leftpos = ($imagew - 66);
                } else {
                    $leftpos = ($imagew - 58);
                }
            } else {
                $leftpos += $Charleft[$schriftmode]['hist'];
            }
            $letterfile = $Letters['hist'];
            $datastring .= "$leftpos $letterfile\n";
            $letter = new Imagick($letterfile);
            $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos, $lettertop_dyn);
            $leftpos += $Charwidth[$schriftmode];
        }

        ### EKENNZEICHEN ANFÜGEN:
        if (!empty($Letters['ekenn'])) {
            $datastring .= "Ekenn\n";
            if (empty($Letters[1]) && empty($Letters[2]) && empty($Letters[3])) {
                if ($schriftmode == 'norm') {
                    $leftpos = ($imagew - 66);
                } else {
                    $leftpos = ($imagew - 58);
                }
            } else {
                $leftpos += $Charleft[$schriftmode]['ekenn'];
            }
            $letterfile = $Letters['ekenn'];
            $datastring .= "$leftpos $letterfile\n";
            $letter = new Imagick($letterfile);
            $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos, $lettertop_dyn);
            $leftpos += $Charwidth[$schriftmode];
        }

    } ### ZWEIZEILIGES SCHILD:
    else {
        ### ZEILE 1:
        $charblockw1 = 0;
        if (!empty($Chars[1])) {
            $charblockw1 += ((count($Chars[1]) * $Charwidth[$schriftmode]) + ((count($Chars[1]) - 1) * $Charleft[$schriftmode]['char']));
        }
        $leftplus1 = (int)(($Pos[$kennzeichen][$groesse]['z1max'] - $charblockw1) / 2);

        $charblockw2 = 0;
        if (!empty($Chars[2])) {
            $charblockw2 += $Pos[$kennzeichen][$groesse]['bl2l'];
            $charblockw2 += ((count($Chars[2]) * $Charwidth[$schriftmode]) + ((count($Chars[2]) - 1) * $Charleft[$schriftmode]['char']));
        }
        if (!empty($Chars[3])) {
            $charblockw2 += $Pos[$kennzeichen][$groesse]['bl3l'];
            $charblockw2 += ((count($Chars[3]) * $Charwidth[$schriftmode]) + ((count($Chars[3]) - 1) * $Charleft[$schriftmode]['num']));
        }
        if (!empty($Letters['hist'])) {
            $charblockw2 += $Charleft[$schriftmode]['hist'];
            $charblockw2 += $Charwidth[$schriftmode];
        }
        if (!empty($Letters['ekenn'])) {
            $charblockw2 += $Charleft[$schriftmode]['ekenn'];
            $charblockw2 += $Charwidth[$schriftmode];
        }
        $leftplus2 = (int)(($Pos[$kennzeichen][$groesse]['z2max'] - $charblockw2) / 2);

        $lettertop_dyn1 = $Pos[$kennzeichen][$groesse]['z1t'];
        $lettertop_dyn2 = $Pos[$kennzeichen][$groesse]['z2t'];
        $leftpos1 = ($Pos[$kennzeichen][$groesse]['z1l'] + $leftplus1);
        $leftpos2 = ($Pos[$kennzeichen][$groesse]['z2l'] + $leftplus2);
        $datastring = "kennzeichen: $kennzeichen | charblockw: $charblockw | leftplus1: $leftplus1 | leftplus2: $leftplus2\n";

        ### BLOCK 1 ERZEUGEN:
        if (!empty($Letters[1])) {
            $datastring .= "Block1\n";
            $lcount = 0;
            foreach ($Letters[1] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['char'] . "\n";
                if ($lcount > 0) {
                    $leftpos1 += $Charleft[$schriftmode]['char'];
                }
                $datastring .= "$leftpos1 $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos1, $lettertop_dyn1);
                $leftpos1 += $Charwidth[$schriftmode];
                $lcount++;
            }
        }

        ### BLOCK 2 ERZEUGEN:
        if (!empty($Letters[2])) {
            $datastring .= "Block2\n";
            $leftpos2 += $Pos[$kennzeichen][$groesse]['bl2l'];
            $datastring .= "leftposplus " . $Pos[$kennzeichen][$groesse]['bl2l'] . "\n";
            $lcount = 0;
            foreach ($Letters[2] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['char'] . "\n";
                if ($lcount > 0) {
                    $leftpos2 += $Charleft[$schriftmode]['char'];
                }
                $datastring .= "$leftpos2 $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos2, $lettertop_dyn2);
                $leftpos2 += $Charwidth[$schriftmode];
                $lcount++;
            }
        }

        ### BLOCK 3 ERZEUGEN:
        if (!empty($Letters[3])) {
            $datastring .= "Block3\n";
            $leftpos2 += $Pos[$kennzeichen][$groesse]['bl3l'];
            $datastring .= "leftposplus " . $Pos[$kennzeichen][$groesse]['bl3l'] . "\n";
            $lcount = 0;
            foreach ($Letters[3] as $lnum => $letterfile) {
                $datastring .= "schriftmode: $schriftmode | Charwidth: " . $Charwidth[$schriftmode] . ' | Charleft: ' . $Charleft[$schriftmode]['num'] . "\n";
                if ($lcount > 0) {
                    $leftpos2 += $Charleft[$schriftmode]['num'];
                }
                $datastring .= "$leftpos2 $letterfile\n";
                $letter = new Imagick($letterfile);
                $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos2, $lettertop_dyn2);
                $leftpos2 += $Charwidth[$schriftmode];
                $lcount++;
            }
        }

        ### HISTORISCH ANFÜGEN:
        if (!empty($Letters['hist'])) {
            $datastring .= "Hist\n";
            if (empty($Letters[1]) && empty($Letters[2])) {
                if ($schriftmode == 'norm') {
                    $leftpos2 = ($imagew - 80);
                } else {
                    $leftpos2 = ($imagew - 64);
                }
            } else {
                $leftpos2 += $Charleft[$schriftmode]['hist'];
            }
            # $leftpos2 += $Charleft[$schriftmode]['hist'];
            $letterfile = $Letters['hist'];
            $datastring .= "$leftpos2 $letterfile\n";
            $letter = new Imagick($letterfile);
            $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos2, $lettertop_dyn2);
            $leftpos2 += $Charwidth[$schriftmode];
        }

        ### EKENNZEICHEN ANFÜGEN:
        if (!empty($Letters['ekenn'])) {
            $datastring .= "Ekenn\n";
            if (empty($Letters[1]) && empty($Letters[2])) {
                if ($schriftmode == 'norm') {
                    $leftpos2 = ($imagew - 80);
                } else {
                    $leftpos2 = ($imagew - 64);
                }
            } else {
                $leftpos2 += $Charleft[$schriftmode]['ekenn'];
            }
            # $leftpos2 += $Charleft[$schriftmode]['ekenn'];
            $letterfile = $Letters['ekenn'];
            $datastring .= "$leftpos2 $letterfile\n";
            $letter = new Imagick($letterfile);
            $image->compositeImage($letter, imagick::COMPOSITE_MULTIPLY, $leftpos2, $lettertop_dyn2);
            $leftpos2 += $Charwidth[$schriftmode];
        }
    }


    if ($loggen == 'ja') {
        $data = "\n-------------------------------------------------\nZeitpunkt: " . date("Y-m-d H:i:s") . "\n$datastring";
        $datei = fopen("shoplogs/ajaxpicneusizes.log", 'a');
        fwrite($datei, "$data\n");
        fclose($datei);
    }


    if (strpos($kennzeichen, 'historisch') !== false) {
        $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_h.png';
        # $letter = new Imagick($letterfile);
        # $image->compositeImage( $letter, imagick::COMPOSITE_MULTIPLY, $letterpos, $lettertop_dyn );
        # $Letters[3][] = $letterfile;
    }

    if (strpos($kennzeichen, 'ekennzeichen') !== false) {
        $letterfile = $lverz . '/' . $schriftmode . '_' . $farbe . '_e.png';
        # $letter = new Imagick($letterfile);
        # $image->compositeImage( $letter, imagick::COMPOSITE_MULTIPLY, $letterpos, $lettertop_dyn );
        # $Letters[3][] = $letterfile;
    }


    ### SAISONKENNZEICHEN-DATUM EINTRAGEN:
    if (!empty($Picdata[$pos_von]) || !empty($Picdata[$pos_bis])) {
        $posleft = ((int)$imagew - $Saispos['standard']['abstandr']);
        $posright = ($posleft + $Saispos['standard']['width']);
        $postopcon = $Saispos['standard']['postopcon'];
        $postopbis = $Saispos['standard']['postopbis'];
        $linetop = $Saispos['standard']['linetop'];
        $fontsize = $Saispos['standard']['fontsize'];

        if (strpos($kennzeichen, 'motorrad') !== false) {
            $postopcon = $Saispos['motorrad']['postopcon'];
            $postopbis = $Saispos['motorrad']['postopbis'];
            $linetop = $Saispos['motorrad']['linetop'];
            $fontsize = $Saispos['motorrad']['fontsize'];
        }
        if ($groesse == 255) {
            $postopcon = $Saispos['255']['postopcon'];
            $postopbis = $Saispos['255']['postopbis'];
            $linetop = $Saispos['255']['linetop'];
            $fontsize = $Saispos['255']['fontsize'];
        }

        $draw = new ImagickDraw();

        $draw->setFont("templates/xtc5/fonts/GL-Nummernschild-Mtl.ttf");
        // $draw->setFont("Helvetica-Narrow");
        $draw->setFontSize($fontsize);
        if (!empty($Picdata[$pos_von])) {
            $image->annotateImage($draw, $posleft, $postopcon, 0, $Picdata[$pos_von]);
        }
        if (!empty($Picdata[$pos_bis])) {
            $image->annotateImage($draw, $posleft, $postopbis, 0, $Picdata[$pos_bis]);
        }
        $line = new ImagickDraw;
        $line->setfillcolor('black');
        $line->setstrokecolor('black');
        $line->setstrokewidth(2);


        $line->line($posleft, $linetop, $posright, $linetop);


        $image->drawimage($line);
    }

    ### HISTORISCHE KENNZEICHEN
    /*
    if ($kennzeichen == 'historisch')
       {
        if   ($zweizeilig == 'ja')
	     {
	      $lettertop_dyn = ($lettertop2zeilig + $lettertop2);
	      if   ($schriftmode == 'norm')
		   {$letterpos = ($imagew - 80);
		   }
	      else {$letterpos = ($imagew - 64);
		   }
	     }
	else {if   ($schriftmode == 'norm')
		   {$letterpos = ($imagew - 66);
		   }
	      else {$letterpos = ($imagew - 58);
		   }
	     }
	$letterfile = $lverz.'/'.$schriftmode.'_'.$farbe.'_h.png';
	$letter = new Imagick($letterfile);
 	$image->compositeImage( $letter, imagick::COMPOSITE_MULTIPLY, $letterpos, $lettertop_dyn );
       }
    */


    header("Content-Type: image/png");
    echo $image;
    // BOF: Neu: Prüfen ob File bereits existiert, auch große Bilder werden nun geschrieben
    $image->writeImage(DIR_FS_DOCUMENT_ROOT . 'kennzeichen_big/' . $filename . '.png');
    // EOF: Neu: Prüfen ob File bereits existiert, auch große Bilder werden nun geschrieben

    $prozent_w = (($max_w_cart) / $imagew);
    $prozent_h = (($max_h_cart) / $imageh);

    if ($prozent_w > $prozent_h) {
        $prozent = $prozent_h;
    } else {
        $prozent = $prozent_w;
    }
    $size_w_new = round($imagew * $prozent);
    $size_h_new = round($imageh * $prozent);

    # $data = $size_w.' x '.$size_h.' prozent_w: '.$prozent_w.' prozent_h: '.$prozent_h.' prozent: '.$prozent.' Neu: '.$size_w_new.' x '.$size_h_new;
    # $data = "\n-------------------------------------------------\nZeitpunkt: ".date("Y-m-d H:i:s")."\n$data";
    # $datei = fopen("shoplogs/ajaxpicsizeneu.log", 'a');
    # fwrite($datei, "$data\n");
    # fclose($datei);

    # $image->scaleImage(148, 0);
    $image->scaleImage($size_w_new, $size_h_new);

    // $filename = umlaute($_REQUEST['picinfo']);
    $image->writeImage(DIR_FS_DOCUMENT_ROOT . 'kennzeichen/' . $filename . '.png');



function checkchars($char, $mode, $typ)
{
    if ($loggen == 'ja') {
        $datei = fopen("shoplogs/ajaxcheckchars.log", 'a');
        fwrite($datei, "Test1: $char\n");
        fclose($datei);
    }

    if ($mode == 'char') {
        $char = preg_replace("'Ü'siU", 'ue', $char);
        $char = preg_replace("'ü'siU", 'ue', $char);
        $char = preg_replace("'Ö'siU", 'oe', $char);
        $char = preg_replace("'ö'siU", 'oe', $char);
        $char = preg_replace("'Ä'siU", 'ae', $char);
        $char = preg_replace("'ä'siU", 'ae', $char);

#	         $datei = fopen("shoplogs/ajaxpic.log", 'a');
#	         fwrite($datei, "Test1: $char\n");
#	         fclose($datei);

        if (preg_match("/([A-Za-zäöüÄÖÜ])/siU", $char)) {
            $string = strtolower($char);
            $string = preg_replace("'Ü'siU", 'ue', $string);
            $string = preg_replace("'ü'siU", 'ue', $string);
            $string = preg_replace("'Ö'siU", 'oe', $string);
            $string = preg_replace("'ö'siU", 'oe', $string);
            $string = preg_replace("'Ä'siU", 'ae', $string);
            $string = preg_replace("'ä'siU", 'ae', $string);
            if ($loggen == 'ja') {
                $datei = fopen("shoplogs/ajaxcheckchars.log", 'a');
                fwrite($datei, "Test-Char: $char\n");
                fclose($datei);
            }
        }

        if ($typ == 'parkplatzschild') {
            if ($char == ' ') {
                $string = 'leer';
                if ($loggen == 'ja') {
                    $datei = fopen("shoplogs/ajaxcheckchars.log", 'a');
                    fwrite($datei, "Test-Char: $char\n");
                    fclose($datei);
                }
            }
            if (preg_match("/^([0-9])/m", $char)) {
                $string = $char;
                if ($loggen == 'ja') {
                    $datei = fopen("shoplogs/ajaxcheckchars.log", 'a');
                    fwrite($datei, "Test-Char: $char\n");
                    fclose($datei);
                }
            }

        }

    }
    if ($mode == 'num') {
        if (preg_match("/^([0-9])/m", $char)) {
            $string = $char;
            if ($loggen == 'ja') {
                $datei = fopen("shoplogs/ajaxcheckchars.log", 'a');
                fwrite($datei, "Test-Num: $char\n");
                fclose($datei);
            }
        }
    }
    return ($string);
}


?>