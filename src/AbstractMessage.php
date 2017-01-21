<?php
/**
 * AbstractMessage
 *
 * PHP version 7+
 *
 * Copyright (c) 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 *
 * @category  Hateoas
 * @package   Hateoas
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
namespace Mostofreddy\Hateoas;

/**
 * AbstractMessage
 *
 * @category  Hateoas
 * @package   Hateoas
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 * @abstract
 */
abstract class AbstractMessage implements \JsonSerializable
{
    protected $data = [];
    protected $links = [];

    /**
     * Agrega un valor a los datos primarios
     * 
     * @param string $key   Clave
     * @param mixed  $value Valor
     * 
     * @return AbstractMessage
     */
    public function add(string $key, $value):AbstractMessage
    {
        $this->data[$key] = $value;
        return $this;
    }
    /**
     * Popula la data primaria
     * 
     * @param array  $data Array con la data primaria
     * 
     * @return AbstractMessage
     */
    public function fillData(array $data):AbstractMessage
    {
        $this->data = $data;
        return $this;
    }
    /**
     * Agrega un valor a los links
     * 
     * @param string $key   Clave
     * @param mixed  $value Valor
     * 
     * @return AbstractMessage
     */
    public function addLink($key, $value):AbstractMessage
    {
        $this->links[$key] = $value;
        return $this;
    }
    /**
     * Popula los links
     * 
     * @param array $data Array con links
     * 
     * @return AbstractMessage
     */
    public function fillLinks(array $links):AbstractMessage
    {
        $this->links = $links;
        return $this;
    }

    /**
     * Transforma el objeto a array
     * 
     * @return array
     */
    public function toArray():array
    {
        $return = $this->data;
        if (!empty($this->links)) {
            $return['links'] = $this->links;
        }
        return $return;
    }
    /**
     * Serializa a Json el objeto
     * 
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }
}
