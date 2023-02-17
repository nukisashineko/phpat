<?php

declare(strict_types=1);

namespace PHPat\Rule\Assertion\Relation\ShouldImplement;

use PHPat\Configuration;
use PHPat\Rule\Assertion\Relation\RelationAssertion;
use PHPat\Rule\Assertion\Relation\ValidationTrait;
use PHPat\Statement\Builder\StatementBuilderFactory;
use PHPat\Test\TestName;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Reflection\ReflectionProvider;
use PHPStan\Type\FileTypeMapper;

abstract class ShouldImplement extends RelationAssertion
{
    use ValidationTrait;

    public function __construct(
        StatementBuilderFactory $statementBuilderFactory,
        Configuration $configuration,
        ReflectionProvider $reflectionProvider,
        FileTypeMapper $fileTypeMapper
    ) {
        parent::__construct(
            __CLASS__,
            $statementBuilderFactory,
            $configuration,
            $reflectionProvider,
            $fileTypeMapper
        );
    }

    protected function applyValidation(TestName $testName, ClassReflection $subject, array $targets, array $targetExcludes, array $nodes): array
    {
        return $this->applyShould($testName, $subject, $targets, $targetExcludes, $nodes);
    }

    protected function getMessage(TestName $testName, string $subject, string $target): string
    {
        return sprintf('%s: %s should implement %s', $testName->getTestName(), $subject, $target);
    }
}
