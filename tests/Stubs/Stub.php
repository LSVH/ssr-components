<?php

namespace LSVH\SSRComponents\Tests\Stubs;

abstract class Stub {
    private $history = [];

    protected function log(string $methodName, array $args = []): void {
        $logs = $this->getLogs($methodName);
        $logs[] = $args;

        $this->history[$methodName] = $logs;
    }

    public function getLogs(string $methodName): array {
        if (array_key_exists($methodName, $this->history)) {
            return $this->history[$methodName];
        }

        return [];
    }
}