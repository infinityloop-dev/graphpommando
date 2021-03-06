<?php

declare(strict_types = 1);

namespace Graphpommando\Helper;

final class AttributeTypeInfo implements TypeInfo
{
    public function __construct(
        private string $type,
        private bool $nullable,
        private ?array $nested = null,
        private bool $constructorPass = false,
    ) {}

    public function allowsNull() : bool
    {
        return $this->nullable;
    }

    public function getTypeName() : string
    {
        return $this->type;
    }

    public function getNestedType() : TypeInfo
    {
        return \is_array($this->nested)
            ? new self(...$this->nested)
            : throw new \RuntimeException();
    }

    public function isConstructorPass() : bool
    {
        return $this->constructorPass;
    }
}
