<?php

namespace Kroschke\Image\Helper;

class Data
{

    protected $Kennzeichenpics = array(
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

    //character width

    protected $Charwidth = [
        'norm' => 54,
        'eng' => 46,
        'engrad' => 33,

    ];

    protected $Chars = array(
        'euro' =>
            array(
                520 =>
                    array(
                        'norm' => 7,
                        'eng' => 8,
                    ),
                480 =>
                    array(
                        'norm' => 6,
                        'eng' => 7,
                    ),
                340 =>
                    array(
                        'norm' => 8,
                        'eng' => 8,
                    ),
            ),
        'saison' =>
            array(
                520 =>
                    array(
                        'norm' => 6,
                        'eng' => 7,
                    ),
                480 =>
                    array(
                        'norm' => 5,
                        'eng' => 6,
                    ),
                340 =>
                    array(
                        'norm' => 7,
                        'eng' => 8,
                    ),
            ),
        'historisch' =>
            array(
                520 =>
                    array(
                        'norm' => 6,
                        'eng' => 7,
                    ),
                480 =>
                    array(
                        'norm' => 5,
                        'eng' => 6,
                    ),
                340 =>
                    array(
                        'norm' => 7,
                        'eng' => 8,
                    ),
            ),
        'ekennzeichen' =>
            array(
                520 =>
                    array(
                        'norm' => 6,
                        'eng' => 7,
                    ),
            ),
        'fahrradtraeger' =>
            array(
                520 =>
                    array(
                        'norm' => 7,
                        'eng' => 8,
                    ),
            ),
        'motorrad' =>
            array(
                220 =>
                    array(
                        'eng' => 8,
                    ),
                180 =>
                    array(
                        'eng' => 7,
                    ),
            ),
        'motorradsaison' =>
            array(
                220 =>
                    array(
                        'eng' => 8,
                    ),
                180 =>
                    array(
                        'eng' => 7,
                    ),
            ),
        'motorradhistorisch' =>
            array(
                220 =>
                    array(
                        'eng' => 7,
                    ),
                180 =>
                    array(
                        'eng' => 6,
                    ),
            ),
        'leichtkraftrad' =>
            array(
                255 =>
                    array(
                        'eng' => 8,
                    ),
            ),
        'leichtkraftradsaison' =>
            array(
                255 =>
                    array(
                        'eng' => 8,
                    ),
            ),
        'leichtkraftradhistorisch' =>
            array(
                255 =>
                    array(
                        'eng' => 8,
                    ),
            ),
        'traktor' =>
            array(
                255 =>
                    array(
                        'eng' => 8,
                    ),
            ),
        'parkplatzschild' =>
            array(
                520 =>
                    array(
                        'norm' => 8,
                        'eng' => 9,
                    ),
            ),
        'euroselbstleuchtend' =>
            array(
                520 =>
                    array(
                        'norm' => 7,
                        'eng' => 8,
                    ),
            ),
        'motorradselbstleuchtend' =>
            array(
                180 =>
                    array(
                        'eng' => 7,
                    ),
            ),
    );


    protected $Charleft = array (
        'norm' =>
            array (
                'char' => 3,
                'num' => 1,
                'hist' => 10,
                'ekenn' => 10,
            ),
        'eng' =>
            array (
                'char' => 3,
                'num' => 1,
                'hist' => 10,
                'ekenn' => 10,
            ),
        'engrad' =>
            array (
                'char' => 3,
                'num' => 1,
                'hist' => 10,
                'ekenn' => 10,
            ),
    );

    protected $Pos = array (
        'euro' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 482,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
                480 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 434,
                        'bl2l' => 66,
                        'bl3l' => 19,
                    ),
                340 =>
                    array (
                        'z1t' => 19,
                        'z2t' => 110,
                        'z1l' => 52,
                        'z1max' => 188,
                        'z2l' => 7,
                        'bl2l' => 15,
                        'bl3l' => 19,
                        'z2max' => 328,
                    ),
            ),
        'saison' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 434,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
                480 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 390,
                        'bl2l' => 66,
                        'bl3l' => 19,
                    ),
                340 =>
                    array (
                        'z1t' => 19,
                        'z2t' => 110,
                        'z1l' => 52,
                        'z1max' => 162,
                        'z2l' => 7,
                        'bl2l' => 15,
                        'bl3l' => 19,
                        'z2max' => 328,
                    ),
            ),
        'historisch' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 482,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
                480 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 434,
                        'bl2l' => 66,
                        'bl3l' => 19,
                    ),
                340 =>
                    array (
                        'z1t' => 19,
                        'z2t' => 110,
                        'z1l' => 52,
                        'z1max' => 188,
                        'z2l' => 7,
                        'bl2l' => 15,
                        'bl3l' => 19,
                        'z2max' => 328,
                    ),
            ),
        'fahrradtraeger' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 482,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
                480 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 434,
                        'bl2l' => 66,
                        'bl3l' => 19,
                    ),
            ),
        'motorrad' =>
            array (
                220 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 54,
                        'z1max' => 130,
                        'z2l' => 12,
                        'z2max' => 208,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
                180 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 51,
                        'z1max' => 130,
                        'z2l' => 7,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
            ),
        'motorradsaison' =>
            array (
                220 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 54,
                        'z1max' => 130,
                        'z2l' => 12,
                        'z2max' => 208,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
                180 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 51,
                        'z1max' => 130,
                        'z2l' => 7,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
            ),
        'motorradhistorisch' =>
            array (
                220 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 54,
                        'z1max' => 130,
                        'z2l' => 12,
                        'z2max' => 208,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
                180 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 51,
                        'z1max' => 130,
                        'z2l' => 7,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
            ),
        'leichtkraftrad' =>
            array (
                255 =>
                    array (
                        'z1t' => 7,
                        'z2t' => 71,
                        'z1l' => 41,
                        'z1max' => 159,
                        'z2l' => 16,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 16,
                    ),
            ),
        'leichtkraftradsaison' =>
            array (
                255 =>
                    array (
                        'z1t' => 7,
                        'z2t' => 71,
                        'z1l' => 41,
                        'z1max' => 125,
                        'z2l' => 9,
                        'z2max' => 204,
                        'bl2l' => 0,
                        'bl3l' => 16,
                    ),
            ),
        'leichtkraftradhistorisch' =>
            array (
                255 =>
                    array (
                        'z1t' => 7,
                        'z2t' => 71,
                        'z1l' => 41,
                        'z1max' => 159,
                        'z2l' => 9,
                        'z2max' => 248,
                        'bl2l' => 0,
                        'bl3l' => 16,
                    ),
            ),
        'traktor' =>
            array (
                255 =>
                    array (
                        'z1t' => 7,
                        'z2t' => 71,
                        'z1l' => 41,
                        'z1max' => 159,
                        'z2l' => 16,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 16,
                    ),
            ),
        'parkplatzschild' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 100,
                        'z1max' => 431,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
            ),
        'euroselbstleuchtend' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 482,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
            ),
        'motorradselbstleuchtend' =>
            array (
                180 =>
                    array (
                        'z1t' => 15,
                        'z2t' => 135,
                        'z1l' => 51,
                        'z1max' => 130,
                        'z2l' => 7,
                        'z2max' => 175,
                        'bl2l' => 0,
                        'bl3l' => 19,
                    ),
            ),
        'ekennzeichen' =>
            array (
                520 =>
                    array (
                        'z1t' => 16,
                        'z1l' => 58,
                        'z1max' => 482,
                        'bl2l' => 65,
                        'bl3l' => 19,
                    ),
            ),
    );

    protected $Saispos = array(
        'standard' =>
            array(
                'abstandr' => 50,
                'width' => 32,
                'postopcon' => 48,
                'postopbis' => 96,
                'linetop' => 60,
                'fontsize' => 35,
            ),
        'motorrad' =>
            array(
                'postopcon' => 102,
                'postopbis' => 131,
                'linetop' => 105,
                'fontsize' => 31,
            ),
        255 =>
            array(
                'postopcon' => 96,
                'postopbis' => 129,
                'linetop' => 101,
                'fontsize' => 33,
            ),
    );

    public function getSaisonPositon($type) {
        if (isset($this->Saispos[$type])) {
            return $this->Saispos[$type];
        }
        return false;
    }

    public function getChar($type, $length) {
        if (isset($this->Chars[$type][$length])) {
            return $this->Chars[$type][$length];
        }
        return false;
    }

    public function getPicture($type) {
        if (isset($this->Kennzeichenpics[$type])) {
            return $this->Kennzeichenpics[$type];
        }
        return false;
    }

    public function getPositions($type, $length) {
        if (isset($this->Pos[$type][$length])) {
            return $this->Pos[$type][$length];
        }
        return false;
    }


    public function getCharLeft($schrift)
    {
        if (isset($this->Charleft[$schrift])) {
            return $this->Charleft[$schrift];
        }
        return false;
    }


    public function checkerlaubt($string)
    {
        $Verboten = array('HJ','KZ','NS','SA','SS');
        if (in_array($string, $Verboten))
        {
            $string = "";
        }
        return $string;
    }

    public function kombinationNichtErlaubt($string)
    {
        $Verboten = array('HJ','KZ','NS','SA','SS');
        if (in_array($string, $Verboten))
        {
            return true;
        }
        return false;
    }
}