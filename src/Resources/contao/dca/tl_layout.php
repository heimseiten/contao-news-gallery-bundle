<?php

use Contao\Config;
use Contao\CoreBundle\DataContainer\PaletteManipulator;

PaletteManipulator::create()
    ->addField('news_gallery_image_size_id',  'image_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_layout') 
;

$GLOBALS['TL_DCA']['tl_layout']['fields'] += [    
    'news_gallery_image_size_id' => [
        'inputType'        => 'imageSize',
        'options_callback' => static function ()
			{
				return Contao\System::getContainer()->get('contao.image.sizes')->getOptionsForUser(Contao\BackendUser::getInstance());
			},
        'reference'        => &$GLOBALS['TL_LANG']['MSC'],
        'eval'             => array( 'rgxp' => 'digit', 'includeBlankOption' => true, 'tl_class'  => 'clr' ),
        'sql'              => "varchar(64) NOT NULL default ''"
    ],
];
