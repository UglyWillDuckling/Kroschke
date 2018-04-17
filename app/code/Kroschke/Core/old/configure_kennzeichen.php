<?php

### Dieses Script immer im utf-8-Modus speichern!



### KENNZEICHEN-ÜBERGABEN

$pos_kennzeichen = 0;
$pos_farbe = 1;
$pos_groesse = 2;
$pos_schrift = 3;
$pos_chars1 = 4;
$pos_chars2 = 5;
$pos_chars3 = 6;
$pos_von = 7;
$pos_bis = 8;



### KENNZEICHEN-ERROR-ÜBERGABEN

$errorpos_kennzeichen = 0;
$errorpos_farbe = 1;
$errorpos_groesse = 2;
$errorpos_maxchars = 3;
$errorpos_maxcharsz2 = 4;
# $errorpos_von = 4;
# $errorpos_bis = 5;
# $errorpos_errornum = 6;

$errorcolor = '#9d0d15';

$Errorsizes = array(
'520' => '520',
'480' => '520',
'340' => '340',
'220' => '340',
'180' => '340',
'255' => '255',
);

$Lettertop_error = array(
'520' => '38',
'340' => '80',
'255' => '50',
);

$Fontsize_error = array(
'520' => '35',
'340' => '35',
'255' => '30',
);



### GRÖSSE AB DER ALLES 2-ZEILIG IST:
$switch2zeilig = 420;

$max_w_cart = 148;
$max_h_cart = 65;







### OPTIONSZUORDNUNGEN (lässt sich natürlich auch automatisieren, falls nötig)


### ÜBERALL GLEICHE AUSGANGSBILDDATEI
$Option['typ'] = array(
17 => 'euro',
18 => 'saison',
19 => 'historisch',
20 => 'parkplatzschild',
47 => 'fahrradtraeger',
48 => 'motorrad',
49 => 'motorradsaison',
50 => 'motorradhistorisch',
51 => 'leichtkraftrad',
52 => 'leichtkraftradsaison',
57 => 'leichtkraftradhistorisch',
58 => 'traktor',
65 => 'euroselbstleuchtend',
66 => 'motorradselbstleuchtend',
82 => 'ekennzeichen',
);

$Option['farbe'] = array(
1 => 'schwarz',
2 => 'gruen',
3 => 'rot',
53 => 'blau',
);

$Option['schrift'] = array(
4 => 'norm',
5 => 'eng',
);

$Option['laenge'] = array(
6 => 520,
7 => 480,
8 => 460,
9 => 440,
10 => 420,
11 => 400,
12 => 380,
13 => 360,
14 => 340,
54 => 220,
55 => 180,
56 => 255,
);


$Kennzeichenpics = array(
'euro' => 'euro',
'saison' => 'euro',
'historisch' => 'euro',
'fahrradtraeger' => 'euro',
'motorrad' => 'euro',
'motorradsaison' => 'euro',
'motorradhistorisch' => 'euro',
'leichtkraftrad' => 'euro',
'leichtkraftradsaison' => 'euro',
'leichtkraftradhistorisch' => 'euro',
'traktor' => 'euro',
'ekennzeichen' => 'euro',
'parkplatzschild' => 'parkplatzschild',
'euroselbstleuchtend' => 'selbstleuchtend',
'motorradselbstleuchtend' => 'selbstleuchtend',
);


$Option['vonbis'] = array(
'23' => '01',
'24' => '02',
'25' => '03',
'26' => '04',
'27' => '05',
'28' => '06',
'29' => '07',
'30' => '08',
'31' => '09',
'32' => '10',
'33' => '11',
'34' => '12',
'35' => '01',
'36' => '02',
'37' => '03',
'38' => '04',
'39' => '05',
'40' => '06',
'41' => '07',
'42' => '08',
'43' => '09',
'44' => '10',
'45' => '11',
'46' => '12',
);


$Nurengschrift = array(
'leichtkraftrad',
'leichtkraftradsaison',
'leichtkraftradhistorisch',
'traktor',
);

//character width

$Charwidth['norm']   = 54;
$Charwidth['eng']    = 46;
$Charwidth['engrad'] = 33;


### MAXIMAL MÖGLICHE ZEICHEN

$Chars['euro']['520']['norm'] = 7;
$Chars['euro']['520']['eng']  = 8;
$Chars['euro']['480']['norm'] = 6;
$Chars['euro']['480']['eng']  = 7;
$Chars['euro']['340']['norm'] = 8;	### Zweizeilig
$Chars['euro']['340']['eng']  = 8;	### Zweizeilig

$Chars['saison']['520']['norm'] = 6;
$Chars['saison']['520']['eng']  = 7;
$Chars['saison']['480']['norm'] = 5;
$Chars['saison']['480']['eng']  = 6;
$Chars['saison']['340']['norm'] = 7;	### Zweizeilig
$Chars['saison']['340']['eng']  = 8;	### Zweizeilig

$Chars['historisch']['520']['norm'] = 6;
$Chars['historisch']['520']['eng']  = 7;
$Chars['historisch']['480']['norm'] = 5;
$Chars['historisch']['480']['eng']  = 6;
$Chars['historisch']['340']['norm'] = 7;	### Zweizeilig
$Chars['historisch']['340']['eng']  = 8;	### Zweizeilig

$Chars['ekennzeichen']['520']['norm'] = 6;
$Chars['ekennzeichen']['520']['eng']  = 7;

$Chars['fahrradtraeger']['520']['norm'] = 7;
$Chars['fahrradtraeger']['520']['eng']  = 8;

$Chars['motorrad']['220']['eng']  = 8;
$Chars['motorrad']['180']['eng']  = 7;

$Chars['motorradsaison']['220']['eng']  = 8;
$Chars['motorradsaison']['180']['eng']  = 7;

$Chars['motorradhistorisch']['220']['eng']  = 7;
$Chars['motorradhistorisch']['180']['eng']  = 6;

$Chars['leichtkraftrad']['255']['eng']  = 8;
$Chars['leichtkraftradsaison']['255']['eng']  = 8;
$Chars['leichtkraftradhistorisch']['255']['eng']  = 8;

$Chars['traktor']['255']['eng']  = 8;

$Chars['parkplatzschild']['520']['norm'] = 8;
$Chars['parkplatzschild']['520']['eng']  = 9;

$Chars['euroselbstleuchtend']['520']['norm'] = 7;
$Chars['euroselbstleuchtend']['520']['eng']  = 8;

$Chars['motorradselbstleuchtend']['180']['eng']  = 7;




### POSITIONIERUNGEN

### DA DIE GRUNDSÄTZLICHEN POSITIONEN INNERHALB EINER BREITE IMMER GLEICH SIND, 
### KANN DIE UNTERSCHEIDUNG NACH euro, saison und historisch wohl entfallen
### Einziger echter Sonderfall wäre dann das Parkplatzschild

$Charleft['norm']['char']   = 3;
$Charleft['norm']['num']    = 1;
$Charleft['norm']['hist']   = 10;
$Charleft['norm']['ekenn']   = 10;
$Charleft['eng']['char']    = 3;
$Charleft['eng']['num']     = 1;
$Charleft['eng']['hist']    = 10;
$Charleft['eng']['ekenn']    = 10;
$Charleft['engrad']['char'] = 3;
$Charleft['engrad']['num']  = 1;
$Charleft['engrad']['hist'] = 10;
$Charleft['engrad']['ekenn'] = 10;



$Pos['euro']['520']['z1t']   =  16;	# Zeile1 oberer Rand
$Pos['euro']['520']['z1l']   =  58;	# Zeile1 linker Rand des Textblocks
$Pos['euro']['520']['z1max'] = 482;	# Zeile 1 maximale Textbreite

$Pos['euro']['520']['bl2l']  =  65;	# Textblock2 Abstand links
$Pos['euro']['520']['bl3l']  =  19;	# Textblock3 Abstand links



$Pos['euro']['480']['z1t']   =  16;	# Zeile1 oberer Rand
$Pos['euro']['480']['z1l']   =  58;	# Zeile1 linker Rand des Textblocks
$Pos['euro']['480']['z1max'] = 434;	# Zeile 1 maximale Textbreite
$Pos['euro']['480']['bl2l']  =  66;	# Textblock2 Abstand links
$Pos['euro']['480']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['saison']['520'] = $Pos['euro']['520'];
$Pos['saison']['520']['z1max'] = 434;	# Zeile 1 maximale Textbreite
$Pos['saison']['480'] = $Pos['euro']['480'];
$Pos['saison']['480']['z1max'] = 390;	# Zeile 1 maximale Textbreite

$Pos['historisch']['520'] = $Pos['euro']['520'];
$Pos['historisch']['480'] = $Pos['euro']['480'];

$Pos['fahrradtraeger'] = $Pos['euro'];

$Pos['euro']['340']['z1t']   =  19;	# Zeile1 oberer Rand
$Pos['euro']['340']['z2t']   = 110;	# Zeile2 oberer Rand
$Pos['euro']['340']['z1l']   =  52;	# Zeile1 linker Rand des 1. Textblocks
$Pos['euro']['340']['z1max'] = 188;	# Zeile 1 maximale Textbreite
$Pos['euro']['340']['z2l']   =   7;	# Zeile2 linker Rand des 2. Textblocks
$Pos['euro']['340']['bl2l']  =  15;	# Textblock2 Abstand links
$Pos['euro']['340']['bl3l']  =  19;	# Textblock3 Abstand links
$Pos['euro']['340']['z2max'] = 328;	# Zeile 2 maximale Textbreite

$Pos['saison']['340'] = $Pos['euro']['340'];
$Pos['saison']['340']['z1max'] = 162;				# Zeile 1 maximale Textbreite

$Pos['historisch']['340'] = $Pos['euro']['340'];

$Pos['motorrad']['220']['z1t']   =  15;	# Zeile1 oberer Rand
$Pos['motorrad']['220']['z2t']   = 135;	# Zeile2 oberer Rand
$Pos['motorrad']['220']['z1l']   =  54;	# Zeile1 linker Rand des 1. Textblocks
$Pos['motorrad']['220']['z1max'] = 130;	# Zeile 1 maximale Textbreite
$Pos['motorrad']['220']['z2l']   =  12;	# Zeile2 linker Rand des 2. Textblocks
$Pos['motorrad']['220']['z2max'] = 208;	# Zeile 2 maximale Textbreite
$Pos['motorrad']['220']['bl2l']  =   0;	# Textblock2 Abstand links
$Pos['motorrad']['220']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['motorradsaison']['220']	  = $Pos['motorrad']['220'];
$Pos['motorradhistorisch']['220'] = $Pos['motorrad']['220'];

$Pos['motorrad']['180']['z1t']   =  15;	# Zeile1 oberer Rand
$Pos['motorrad']['180']['z2t']   = 135;	# Zeile2 oberer Rand
$Pos['motorrad']['180']['z1l']   =  51;	# Zeile1 linker Rand des Textblocks
$Pos['motorrad']['180']['z1max'] = 130;	# Zeile 1 maximale Textbreite
$Pos['motorrad']['180']['z2l']   =   7;	# Zeile2 linker Rand des Textblocks
$Pos['motorrad']['180']['z2max'] = 175;	# Zeile 2 maximale Textbreite
$Pos['motorrad']['180']['bl2l']  =   0;	# Textblock2 Abstand links
$Pos['motorrad']['180']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['motorradsaison']['180']     = $Pos['motorrad']['180'];
$Pos['motorradhistorisch']['180'] = $Pos['motorrad']['180'];

$Pos['leichtkraftrad']['255']['z1t']   =   7;	# Zeile1 oberer Rand
$Pos['leichtkraftrad']['255']['z2t']   =  71;	# Zeile2 oberer Rand
$Pos['leichtkraftrad']['255']['z1l']   =  41;	# Zeile1 linker Rand des Textblocks
$Pos['leichtkraftrad']['255']['z1max'] = 159;	# Zeile 1 maximale Textbreite
$Pos['leichtkraftrad']['255']['z2l']   =  16;	# Zeile2 linker Rand des Textblocks
$Pos['leichtkraftrad']['255']['z2max'] = 175;	# Zeile 2 maximale Textbreite
$Pos['leichtkraftrad']['255']['bl2l']  =   0;	# Textblock2 Abstand links
$Pos['leichtkraftrad']['255']['bl3l']  =  16;	# Textblock3 Abstand links

$Pos['leichtkraftradsaison']['255'] = $Pos['leichtkraftrad']['255'];
$Pos['leichtkraftradsaison']['255']['z1max'] = 125;	# Zeile 1 maximale Textbreite
$Pos['leichtkraftradsaison']['255']['z2l']   =  9;	# Zeile2 linker Rand des Textblocks
$Pos['leichtkraftradsaison']['255']['z2max'] = 204;	# Zeile 2 maximale Textbreite

$Pos['leichtkraftradhistorisch']['255'] = $Pos['leichtkraftrad']['255'];
$Pos['leichtkraftradhistorisch']['255']['z2l']   =  9;	# Zeile2 linker Rand des Textblocks
$Pos['leichtkraftradhistorisch']['255']['z2max'] = 248;	# Zeile 2 maximale Textbreite

$Pos['traktor']['255'] = $Pos['leichtkraftrad']['255'];

$Pos['parkplatzschild']['520']['z1t']   =  16;	# Zeile1 oberer Rand
$Pos['parkplatzschild']['520']['z1l']   = 100;	# Zeile1 linker Rand des Textblocks
$Pos['parkplatzschild']['520']['z1max'] = 431;	# Zeile 1 maximale Textbreite
$Pos['parkplatzschild']['520']['bl2l']  =  65;	# Textblock2 Abstand links
$Pos['parkplatzschild']['520']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['euroselbstleuchtend']['520']['z1t']   =  16;	# Zeile1 oberer Rand
$Pos['euroselbstleuchtend']['520']['z1l']   =  58;	# Zeile1 linker Rand des Textblocks
$Pos['euroselbstleuchtend']['520']['z1max'] = 482;	# Zeile 1 maximale Textbreite
$Pos['euroselbstleuchtend']['520']['bl2l']  =  65;	# Textblock2 Abstand links
$Pos['euroselbstleuchtend']['520']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['motorradselbstleuchtend']['180']['z1t']   =  15;	# Zeile1 oberer Rand
$Pos['motorradselbstleuchtend']['180']['z2t']   = 135;	# Zeile2 oberer Rand
$Pos['motorradselbstleuchtend']['180']['z1l']   =  51;	# Zeile1 linker Rand des Textblocks
$Pos['motorradselbstleuchtend']['180']['z1max'] = 130;	# Zeile 1 maximale Textbreite
$Pos['motorradselbstleuchtend']['180']['z2l']   =   7;	# Zeile2 linker Rand des Textblocks
$Pos['motorradselbstleuchtend']['180']['z2max'] = 175;	# Zeile 2 maximale Textbreite
$Pos['motorradselbstleuchtend']['180']['bl2l']  =   0;	# Textblock2 Abstand links
$Pos['motorradselbstleuchtend']['180']['bl3l']  =  19;	# Textblock3 Abstand links

$Pos['ekennzeichen']['520'] = $Pos['euro']['520'];


### SAISONKENNZEICHEN-PARAMETER:

$Saispos['standard']['abstandr']  = 50;
$Saispos['standard']['width']     = 32;
$Saispos['standard']['postopcon'] = 48;
$Saispos['standard']['postopbis'] = 96;
$Saispos['standard']['linetop']   = 60;
$Saispos['standard']['fontsize']  = 35;

# $Saispos['motorrad']['abstandr']  = 50;
# $Saispos['motorrad']['width']     = 32;
$Saispos['motorrad']['postopcon'] = 102;
$Saispos['motorrad']['postopbis'] = 131;
$Saispos['motorrad']['linetop']   = 105;
$Saispos['motorrad']['fontsize']  = 31;

# $Saispos['255']['abstandr']  = 50;
# $Saispos['255']['width']     = 32;
$Saispos['255']['postopcon'] = 96;
$Saispos['255']['postopbis'] = 129;
$Saispos['255']['linetop']   = 101;
$Saispos['255']['fontsize']  =  33;







function umlaute($char)
  {
   $char = preg_replace("'Ü'siU",'ue',$char);
   $char = preg_replace("'ü'siU",'ue',$char);
   $char = preg_replace("'Ö'siU",'oe',$char);
   $char = preg_replace("'ö'siU",'oe',$char);
   $char = preg_replace("'Ä'siU",'ae',$char);
   $char = preg_replace("'ä'siU",'ae',$char);
   $char = preg_replace("' 'siU",'_',$char);

   return($char);
  }






function checkerlaubt($string)
  {
   $Verboten = array('HJ','KZ','NS','SA','SS');
   if (in_array($string, $Verboten))
      {
       $string = "";
      }
   return $string;
  }

function kombinationNichtErlaubt($string)
{
    $Verboten = array('HJ','KZ','NS','SA','SS');
    if (in_array($string, $Verboten))
    {
        return true;
    }
    return false;
}


?>