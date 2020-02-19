<?php declare(strict_types = 1);
/**
 * \P7Graph\Adaptor\AdaptorInterface
 * 
 * API definiton for adaptors to image generating libraries
 *
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

interface AdaptorInterface
{

    public function __construct(\P7Graph\Config $config);
    public function setPixel(int $x, int $y, string $color = '');
    public function render();
    
}
