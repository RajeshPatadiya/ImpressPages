<?php
/**
 * @package   ImpressPages
 */

namespace Modules\standard\design;


class Service
{

    protected function __construct()
    {
    }

    /**
     * @return Service
     */
    public static function instance()
    {
        return new Service();
    }

    public function compileThemeLess($themeName, $filename)
    {
        $lessCompiler = LessCompiler::instance();
        return $lessCompiler->getCompiledCssUrl($themeName, $filename);
    }

    /**
     * @param $themeName
     * @param $filename
     * @return string url to real time compiled less. Available only with admin login.
     */
    public function getRealTimeUrl($themeName, $filename) {
        $configModel = ConfigModel::instance();
        $site = \Ip\ServiceLocator::getSite();
        $data = array(
            'g' => 'standard',
            'm' => 'design',
            'aa' => 'realTimeLess',
            'file' => $filename,
            'ipDesignPreview' => 1,
            'ipDesign' => array(
                'pCfg' => $configModel->getAllConfigValues($themeName)
            ),
            'rpc' => '2.0'
        );
        $url = $site->generateUrl(null, null, array(), $data);
        return $url;
    }

    /**
     * @param string $name
     * @param string $default
     * @param string $themeName
     * @return string
     */
    public function getThemeOption($name, $default = null, $themeName = THEME)
    {
        $configModel = ConfigModel::instance();
        $value = $configModel->getConfigValue($themeName, $name, $default);
        return $value;
    }


    public function getTheme($themeName)
    {
        return Model::instance()->getTheme($themeName);
    }

    public function saveWidgetOptions(Theme $theme)
    {
        $parametersMod = \Ip\ServiceLocator::getParametersMod();
        $widgetOptions = $theme->getWidgetOptions();
        if (isset($widgetOptions['image']['width'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image', 'width', $widgetOptions['image']['width']);
        }
        if (isset($widgetOptions['image']['height'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image', 'height', $widgetOptions['image']['height']);
        }
        if (isset($widgetOptions['image']['bigWidth'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image', 'big_width', $widgetOptions['image']['bigWidth']);
        }
        if (isset($widgetOptions['image']['bigHeight'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image', 'big_height', $widgetOptions['image']['bigHeight']);
        }

        if (isset($widgetOptions['imageGallery']['width'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image_gallery', 'width', $widgetOptions['imageGallery']['width']);
        }
        if (isset($widgetOptions['imageGallery']['height'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image_gallery', 'height', $widgetOptions['imageGallery']['height']);
        }
        if (isset($widgetOptions['imageGallery']['bigWidth'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image_gallery', 'big_width', $widgetOptions['imageGallery']['bigWidth']);
        }
        if (isset($widgetOptions['imageGallery']['bigHeight'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_image_gallery', 'big_height', $widgetOptions['imageGallery']['bigHeight']);
        }

        if (isset($widgetOptions['logoGallery']['width'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_logo_gallery', 'width', $widgetOptions['logoGallery']['width']);
        }
        if (isset($widgetOptions['logoGallery']['height'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_logo_gallery', 'height', $widgetOptions['logoGallery']['height']);
        }

        if (isset($widgetOptions['textImage']['width'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_text_image', 'width', $widgetOptions['textImage']['width']);
        }
        if (isset($widgetOptions['textImage']['height'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_text_image', 'height', $widgetOptions['textImage']['height']);
        }
        if (isset($widgetOptions['textImage']['bigWidth'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_text_image', 'big_width', $widgetOptions['textImage']['bigWidth']);
        }
        if (isset($widgetOptions['textImage']['bigHeight'])) {
            $parametersMod->setValue('standard', 'content_management', 'widget_text_image', 'big_height', $widgetOptions['textImage']['bigHeight']);
        }

    }



}