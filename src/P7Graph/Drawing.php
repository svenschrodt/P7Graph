<?php declare(strict_types = 1);
/**
 * \P7Graph\Drawing
 *
 * Class for configuration of graphs with (useful) default values
 *
 * @package P7Graph
 * @author Sven Schrodt<sven@schrodt-service.net>
 * @version 0.1
 * @since 19.02.2020
 * @link https://github.com/svenschrodt/P7Graph
 * @license https://github.com/svenschrodt/P7Graph/blob/master/LICENSE.md
 * @copyright Sven Schrodt<sven@schrodt-service.net>
 */
namespace P7Graph;

class Drawing
{

    /**
     * Configuration for graphs
     *
     * @var \P7Graph\Config | null
     */
    protected $config = null;

    /**
     * Adapter to PHP extension for creating image binaries
     *
     * @var \P7Graph\Adaptor\AdaptorInterface
     */
    protected $adaptor = null;

    /**
     * Constructor function
     *
     * @todo interface injection for config
     */
    public function __construct($config = null)
    {
        if (is_null($config)) {
            $config = new Config();
        }

        $this->config = $config;
        // @todo validate $this->config->adaptor;
        $fp = '\P7Graph\Adaptor\\' . $this->config->adaptor;
        $this->adaptor = new $fp($this->config);
    }

    /**
     * Returning binary image information as string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->adaptor->render();
    }

    /**
     * Direct output of binary image representation with http content type 
     * 
     */    
    public function show()
    {
        header('Content-Type: image/' . $this->config->mimeType);
        echo $this;
    }
    
    /**
     * Setting pixel @ coordinates $x, $y with color $color
     * 
     * @param int $x
     * @param int $y
     * @param string $color
     */
    public function setPixel(int $x, int $y, string $color = '')
    {
        $this->adaptor->setPixel($x, $y, $color);
    }
}
