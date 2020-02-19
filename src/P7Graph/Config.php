<?php declare(strict_types = 1);
/**
 * \P7Graph\Config
 *
 * Class for configuration of graphs with (useful) default values
 *
 * - magical interceptors for READONLY access to class members
 * - explicit setter functions for validation purposes
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

class Config
{

    /**
     * Name of default adaptor for image creating extension 
     * 
     * @var string
     */
    protected $adaptor = 'Imagick';
    
    /**
     * Default image width 
     * 
     * @var integer
     */
    protected $maxWidth = 1024;
    
    /**
     * Default image height
     *
     * @var integer
     */
    protected $maxHeight = 768;
    
    
    /**
     * Default color value for (optional) axis
     * 
     * @var string
     */
    protected $axisColor = 'blue';
    
    /**
     * Flag, if axis will be drawn 
     * 
     * @var string
     */
    protected $withAxis = true;
    
    /**
     * Default value for background color
     * 
     * @var string
     */
    protected $bgColor = 'white';
    
    /**
     * Default value for image type 
     * @var string
     */
    protected $mimeType = 'png' ;
    
    
    
    /**
     * Constructor function 
     * 
     * @todo optional parameters
     */
    public function __construct()
    {
        
    }
    
    /**
     * Magical interceptor for public READONLY access to class members
     * 
     * @param string $name
     * @return NULL|string
     */
    public function __get(string $name)
    {
        $return = null;
        switch(strtolower($name)) {
            case  'adaptor' :
                $return = $this->adaptor;
                break;
                
            case  'test' :
                $return = 'FOO 42!';
                break;
                
            default:
                $return  = (isset($this->$name)) ? $this->$name : null;
                
        }
        
        return $return;
    }
    
    /**
     * Setter for flag, if axis will be drawn
     * 
     * @param bool $value
     */
    public function setWithAxis(bool $value)
    {
        $this->withAxis = $value;
    }
}
