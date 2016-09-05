<?php

declare(strict_types = 1);

namespace functional\core\structures;

use function functional\core\type;

abstract class ƒstructure {
    /**
     * @var array
     */
    protected $ƒdefinition = [];

    /**
     * @var array
     */
    protected $ƒdata = [];

    /**
     * @var array
     */
    protected $ƒname = 'structure';

    public function __construct(array $data)
    {
        foreach ($data as $property => $value) {
            $this->$property = $value;
        }

        assert($this->ƒthrow_if_not_all_set());
    }

    private function ƒthrow_if_not_all_set() : bool
    {
        foreach ($this->ƒdefinition as $property => $type) {
            if ($type !== 'mixed' && !isset($this->ƒdata[$property])) {
                throw new property_is_not_set($property, $type, $this->ƒname);
            }
        }

        return true;
    }

    public function __set($property, $value)
    {
        assert($this->ƒthrow_if_not_defined($property, $value));
        assert($this->ƒthrow_if_wrong_type($property, $value));

        $this->ƒdata[$property] = $value;
    }

    private function ƒthrow_if_not_defined(string $property) : bool
    {
        if (!isset($this->ƒdefinition[$property])) {
            throw new property_is_not_defined($property, $this->ƒname);
        }

        return true;
    }

    private function ƒthrow_if_wrong_type(string $property, $value) : bool
    {
        $type = $this->ƒdefinition[$property];

        if ($type !== 'mixed' && $type !== type($value)) {
            throw new value_is_wrong_type($property, $type, type($value), $this->ƒname);
        }

        return true;
    }

    public function __get($property)
    {
        if ($property === 'class') {
            return $this->ƒname;
        }

        assert($this->ƒthrow_if_not_defined($property));

        if (isset($this->ƒdata[$property])) {
            return $this->ƒdata[$property];
        }

        return null;
    }
}
