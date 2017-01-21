<?php
/**
 * ErrorMessage
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

use Mostofreddy\Hateoas\AbstractMessage;
/**
 * ErrorMessage
 *
 * @category  Hateoas
 * @package   Hateoas
 * @author    Federico Lozada Mosto <mosto.federico@gmail.com>
 * @copyright 2016 Federico Lozada Mosto <mosto.federico@gmail.com>
 * @license   MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link      http://www.mostofreddy.com.ar
 */
class ErrorMessage extends AbstractMessage
{
    protected $errors = [];

    /**
     * Agrega un mensaje de error
     * 
     * @param string         $title   Título
     * @param string|array   $details Descripción. Default: ''
     * @param int|integer    $status  Http Status. Default: 500
     * @param integer|string $code    Código interno. Default: 0
     * @param array          $extra   Array con valores libres. Default: []
     * 
     * @return ErrorMessage
     */
    public function addError(string $title, $details = '', int $status = 500, $code = 0, array $extra = []):ErrorMessage
    {
        $this->errors[] = array_merge(
            [
                'title' => $title,
                'details' => $details,
                'code' => $code,
                'status' => $status
            ],
            $extra
        );
        return $this;
    }

    /**
     * Transforma el objeto a array
     * 
     * @return array
     */
    public function toArray():array
    {
        return array_merge(
            parent::toArray(),
            ['errors' => $this->errors]
        );
    }
}
