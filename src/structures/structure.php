<?php

declare(strict_types = 1);

namespace functional\structures;

use function functional\type;
use function functional\helpers\error;
use function functional\helpers\format;

abstract class ⦗structure⦘ {
    /**
     * @var array
     */
    protected $⦗definition⦘ = [];

    /**
     * @var array
     */
    protected $⦗data⦘ = [];

    /**
     * @var array
     */
    protected $⦗name⦘ = "structure";

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }

        foreach ($this->⦗definition⦘ as $key => $value) {
            if ($this->⦗definition⦘[$key] != "mixed" && !isset($this->⦗data⦘[$key])) {
                error(format('"%s" should be "%s"', $key, $this->⦗definition⦘[$key]), false);
            }
        }
    }

    /**
     * @param string $key
     *
     * @return mixed
     */
    public function __get($key)
    {
        if ($key == "class") {
            return $this->⦗name⦘;
        }

        if (!isset($this->⦗definition⦘[$key])) {
            error(format('"%s" is not part of "%s"', $key, $this->⦗class⦘));
        }

        return $this->⦗data⦘[$key];
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        if (!isset($this->⦗definition⦘[$key])) {
            error(format('"%s" is not part of "%s"', $key, $this->⦗class⦘));
        }

        if ($this->⦗definition⦘[$key] != "mixed" && type($value) != $this->⦗definition⦘[$key]) {
            error(format('"%s" should be "%s"', $key, $this->⦗definition⦘[$key]));
        }

        $this->⦗data⦘[$key] = $value;
    }
}
