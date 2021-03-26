<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;
use Grav\Common\File\CompiledYamlFile;


/**
 * Class PPRPlugin
 * @package Grav\Plugin
 */
class PPRPlugin extends Plugin
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        // Don't proceed if we are in the admin plugin
        if ($this->isAdmin()) {
            return;
        }

        // Enable the main event we are interested in
        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }

    public function onPageInitialized()
    {
        $bp = $this->grav['page']->path().'/';
        $expectedPathName = $bp . $this->config->get('plugins.per-page-resources.base_path');
        // Check if file exists
        if (file_exists($expectedPathName)) {
           // Load and parse YAML content here
           $file = CompiledYamlFile::instance($expectedPathName);
           $data = $file->file->content(null, true);
           if (!empty($data['js'])) {
              foreach($data['js'] as $js) 
                 $this->grav['assets']->addJs($bp.$js);
           }
           if (!empty($data['css'])) {
              foreach($data['css'] as $css) 
                 $this->grav['assets']->addCss($bp.$css);
           }
           
        }
    }
}
