<?php

namespace Agenda\Utils;

class JsonHandler
{
    private string $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function readJsonFile(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $content = file_get_contents($this->filePath);
        return json_decode($content, true) ?? [];
    }

    public function writeJsonFile(array $data): bool
    {
        $jsonData = json_encode($data, JSON_PRETTY_PRINT);
        return file_put_contents($this->filePath, $jsonData) !== false;
    }
}
