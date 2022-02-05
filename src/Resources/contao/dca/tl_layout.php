<?php

use Contao\Config;
use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addLegend('news_gallery_legend',  'image_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('news_gallery_image_size_id',  'news_gallery_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_layout') 
;

$GLOBALS['TL_DCA']['tl_layout']['fields'] += [    
    'news_gallery_image_size_id' => [
        'inputType'        => 'imageSize',
        'options'          => \System::getImageSizes(),
        'reference'        => &$GLOBALS['TL_LANG']['MSC'],
        'eval'             => array( 'rgxp' => 'digit', 'includeBlankOption' => true, 'tl_class'  => 'clr' ),
        'sql'              => "varchar(64) NOT NULL default ''"
    ],
];
