<?php

declare(strict_types=1);

namespace PHPat\Test;

use PHPat\Rule\Assertion\Declaration\DeclarationAssertion;
use PHPat\Selector\SelectorInterface;

class DeclarationRule implements Rule
{
    /** @var array<SelectorInterface> */
    public array $subjects = [];
    /** @var array<SelectorInterface> */
    public array $subjectExcludes = [];
    /** @var null|class-string<DeclarationAssertion> */
    public ?string $assertion = null;

    /**
     * @return null|class-string<DeclarationAssertion>
     */
    public function getAssertion(): ?string
    {
        return $this->assertion;
    }

    public function getSubjects(): array
    {
        return $this->subjects;
    }

    public function getSubjectExcludes(): array
    {
        return $this->subjectExcludes;
    }

    public function getTargets(): array
    {
        return [];
    }

    public function getTargetExcludes(): array
    {
        return [];
    }
}
