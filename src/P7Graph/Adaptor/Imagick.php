<?php declare(strict_types = 1);
/**
 * \P7Graph\Adaptor\Imagick
 *
 * Adaptor class for usage of PECL extension Imagick
 *
 * @todo checking for installed module
 *
 * @package P7Graph
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @version 0.1
 * @since 19.02.2020
 * @link https://github.com/svenschrodt/P7Graph
 * @license https://github.com/svenschrodt/P7Graph/blob/master/LICENSE.md
 * @copyright Sven Schrodt<sven@schrodt-service.net>
 */
namespace P7Graph\Adaptor;

class Imagick implements AdaptorInterface
{

    /**
     * Configuration
     * 
     * @var \P7Graph\Config
     */
    protected $config = null;

    /**
     * Current representation of drawing state(s)
     * 
     * @var \ImagickDraw
     */
    protected $draw = null;

    /**
     * Binary representation of image
     * 
     * @var \Imagick
     */
    protected $image = null;

    
    /**
     * Constructor function 
     * 
     */
    public function __construct(\P7Graph\Config $config)
    {
        $this->config = $config;

        $this->image = new \Imagick();
       
        $this->draw = new \ImagickDraw();
        $this->init();
    }

    /**
     * 
     */
    protected function init()
    {
        $this->image->newImage($this->config->maxWidth, $this->config->maxHeight, $this->config->bgColor);
        
        // Checking, if axis should be drawn

        // var_dump(($this->config->withAxis) );die;
        if ($this->config->withAxis) {
            $halfX = round($this->config->maxWidth / 2, 0);
            $halfY = round($this->config->maxHeight / 2, 0);

            // Drawing axis
            $this->draw->setStrokeColor($this->config->axisColor);
            $this->draw->line($halfX, 0, $halfX, $this->config->maxHeight - 1);
            $this->draw->line(0, $halfY, $this->config->maxWidth - 1, $halfY);
        }
    }

    
    /**
     * Setting pixel @ coordinates $x, $y with given $color or current color 
     * 
     * @param int $x
     * @param int $y
     * @param string $color
     */
    public function setPixel(int $x, int $y, string $color = '')
    {
        if($color !='') {
            $this->draw->setFillColor($color);
        }
        $this->draw->point($x, $y);
    }
    
    
    public function render()
    {
        // var_dump($this->image);die;
        $this->image->drawImage($this->draw);
        $this->image->setImageFormat($this->config->mimeType);
        //
        return $this->image->getImageBlob();
    }
}
