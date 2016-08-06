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

        assert($this->⦗check_construct⦘());
    }

    private function ⦗check_construct⦘() : bool
    {
        foreach ($this->⦗definition⦘ as $key => $value) {
            if ($this->⦗definition⦘[$key] != "mixed" && !isset($this->⦗data⦘[$key])) {
                error(format('"%s" should be "%s"', $key, $this->⦗definition⦘[$key]), false);
            }
        }

        return true;
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

        assert($this->⦗check_get⦘($key), format('getting "%s"', $key));

        if (isset($this->⦗data⦘[$key])) {
            return $this->⦗data⦘[$key];
        }

        return null;
    }

    private function ⦗check_get⦘(string $key) : bool
    {
        if (!isset($this->⦗definition⦘[$key])) {
            error(format('"%s" is not part of "%s"', $key, $this->⦗name⦘), false);
            return false;
        }

        return true;
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function __set($key, $value)
    {
        assert($this->⦗check_set⦘($key, $value), format('setting "%s"', $key));

        $this->⦗data⦘[$key] = $value;
    }

    private function ⦗check_set⦘(string $key, $value) : bool
    {
        if (!isset($this->⦗definition⦘[$key])) {
            error(format('"%s" is not part of "%s"', $key, $this->⦗name⦘), false);
            return false;
        }

        if ($this->⦗definition⦘[$key] != "mixed" && type($value) != $this->⦗definition⦘[$key]) {
            error(format('"%s" should be "%s"', $key, $this->⦗definition⦘[$key]), false);
            return false;
        }

        return true;
    }
}
