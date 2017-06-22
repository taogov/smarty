<?php
return array(
    'debugging'       => false,
    'caching'         => false,
    'cache_lifetime'  => 120,

    'left_delimiter'  => '{%',
    'right_delimiter' => '%}',

        // path info
    'template_path'   => base_path() . '/resources/views',
    // smarty cache directory
    'cache_path'      => storage_path() . '/framework/smarty/cache',
    // smarty template compiler
    'compile_path'    => storage_path() . '/framework/smarty/compile',

    // The path to additional Smarty plugins
    'plugins_paths'   => array(
        base_path() . '/libraries/smarty/plugins'
    ),

   'configs_paths'    => array(
       public_path('config')
   )
);
