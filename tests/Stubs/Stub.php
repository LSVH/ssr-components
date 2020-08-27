<?php

namespace LSVH\SSRComponents\Tests\Stubs;

abstract class Stub {
    private $logs = [];
    private $mocks = [];


    public function getLogs(string $methodName): array {
        if (array_key_exists($methodName, $this->logs)) {
            return $this->logs[$methodName];
        }

        return [];
    }

    public function setMock(string $methodName, $return): void {
        $this->mocks[$methodName] = $return;
    }

    protected function getMock(string $methodName, $fallback = null) {
        if (array_key_exists($methodName, $this->mocks)) {
            return $this->mocks[$methodName];
        }

        return $fallback;
    }

    protected function stub(string $methodName, $defaultReturn = null, array $args = []) {
        $logs = $this->getLogs($methodName);
        $logs[] = $args;

        $this->logs[$methodName] = $logs;

        return $this->getMock($methodName, $defaultReturn);
    }
}