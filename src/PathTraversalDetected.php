<?php

declare(strict_types=1);

namespace League\Flysystem;

use RuntimeException;

class PathTraversalDetected extends RuntimeException implements FilesystemError
{
    /**
     * @var string
     */
    private $path;

    public function path(): string
    {
        return $this->path;
    }

    public static function forPath(string $path): PathTraversalDetected
    {
        $e = new static("Path traversal detected: {$path}");
        $e->path = $path;

        return $e;
    }
}