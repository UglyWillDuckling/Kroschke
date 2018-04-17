<?php

namespace Kroschke\Image\Model;

class Image
{
    /**
     * @var \Kroschke\Image\Helper\Data
     */
    private $imageHelper;
    /**
     * @var \Magento\Framework\App\Filesystem\DirectoryList
     */
    private $directoryList;

    public function __construct(
        \Kroschke\Image\Helper\Data $imageHelper,
        \Magento\Framework\App\Filesystem\DirectoryList $directoryList
)
    {
        $this->imageHelper = $imageHelper;
        $this->directoryList = $directoryList;
    }


    public function generate($params)
    {

        ini_set('display_errors', 1);

        $helper = $this->imageHelper;


        $Chars = array();
        $letters = 0;

        $kennzeichenpic = $helper->getPicture($params['type']);
        $kennzeichen = $params['kennzeichen'];
        $groesse = $params['width'];
        $farbe = $params['color'];


        $media_path = $this->getMediaPath();

        //get image from app
        $imagefile = $media_path . $kennzeichenpic . $farbe . $groesse . '.png';

        $image = new \Imagick($imagefile);

        $imagesize = $image->getImageGeometry();
        $imagew = $imagesize['width'];
        $imageh = $imagesize['height'];


        ### ZEICHENFELD 1
        if (!empty($params['text1']) || $params['text1'] == '0') {
            for ($i = 0; $i < strlen($params['text1']); $i++) {
                $val = $params['text1'][$i];
                $char = $params['text1'][$i];

                $char = $this->checkchars(utf8_encode($char), 'char', $kennzeichen);
                if (!empty($char) || $char == '0') {
                    $Chars[1][] = $char;
                    $letters++;
                }
            }
        }


    }

    protected function getMediaPath() {
        $media_path = $this->directoryList->getPath(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);

        return $media_path . '/kroschke/schilder/';

    }

    protected function checkchars($char, $mode, $typ)
    {
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
            }
        }
        return $string;
    }

}