<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;

$GLOBALS['TL_DCA']['tl_news']['fields']['gallery'] = [ 
    'label'     => &$GLOBALS['TL_LANG']['tl_news']['gallery'], 
    'exclude'               => true,
    'inputType'             => 'fileTree',
    'eval'                  => ['fieldType'=>'checkbox', 'files'=>true, 'multiple'=>true, 'tl_class'=>'clr', 'extensions'=>\Contao\Config::get('uploadTypes'), 'orderField'=>'orderedImages', 'isGallery'=>true],
    'sql'                   => 'blob NULL'
];

$GLOBALS['TL_DCA']['tl_news']['fields']['orderedImages'] = [ 
    'label'                 => &$GLOBALS['TL_LANG'][$table]['orderedImages'],
    'sql'                   => 'blob NULL'
];

PaletteManipulator::create()
    ->addLegend('galleryLegend', 'title_legend', PaletteManipulator::POSITION_AFTER)
    ->addField('gallery', 'galleryLegend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_news') 
;
