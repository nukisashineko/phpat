<?php

use PhpParser\Node\Name;

if (!function_exists('extractNamespaceFromFQCN')) {
    function extractNamespaceFromFQCN(string $classname): string
    {
        $parts = explode('\\', $classname);
        array_pop($parts);

        return implode('\\', $parts);
    }
}

if (!function_exists('trimSeparators')) {
    function trimSeparators(string $name): string
    {
        return rtrim(ltrim($name, '\\'), '\\');
    }
}

if (!function_exists('isRegularExpression')) {
    function isRegularExpression(string $string): bool
    {
        set_error_handler(function () {
        }, E_WARNING);
        $isRegularExpression = preg_match($string, "") !== false;
        restore_error_handler();

        return $isRegularExpression;
    }
}

if (!function_exists('namesToClassStrings')) {
    /**
     * @param array<Name> $names
     * @return array<class-string>
     */
    function namesToClassStrings(array $names): array
    {
        return array_map(
            static fn(Name $name): string => (string) $name,
            $names
        );
    }
}
