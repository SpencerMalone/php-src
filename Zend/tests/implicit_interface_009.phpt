--TEST--
Implicit interface can have constants and inherit them
--FILE--
<?php

// Test 1: Implicit interface with directly declared constants
implicit interface LoggerInterface {
    public const LEVEL_INFO = 1;
    public const LEVEL_ERROR = 2;

    public function log(string $message, int $level): void;
}

echo "Direct constants:\n";
echo "LEVEL_INFO = " . LoggerInterface::LEVEL_INFO . "\n";
echo "LEVEL_ERROR = " . LoggerInterface::LEVEL_ERROR . "\n";

class SimpleLogger {
    public function log(string $message, int $level): void {
        echo "[$level] $message\n";
    }
}

echo "SimpleLogger instanceof LoggerInterface: ";
var_dump((new SimpleLogger()) instanceof LoggerInterface);

// Test 2: Implicit interface extending regular interface with constants
interface BaseConfig {
    public const DEFAULT_TIMEOUT = 30;
    public const MAX_CONNECTIONS = 100;
}

implicit interface ExtendedConfig extends BaseConfig {
    public const MAX_RETRIES = 3;
    public function getConfig(): array;
}

echo "\nInherited and own constants:\n";
echo "DEFAULT_TIMEOUT = " . ExtendedConfig::DEFAULT_TIMEOUT . "\n";
echo "MAX_CONNECTIONS = " . ExtendedConfig::MAX_CONNECTIONS . "\n";
echo "MAX_RETRIES = " . ExtendedConfig::MAX_RETRIES . "\n";

class ConfigManager {
    public function getConfig(): array {
        return ['timeout' => 30];
    }
}

echo "ConfigManager instanceof ExtendedConfig: ";
var_dump((new ConfigManager()) instanceof ExtendedConfig);

// Test 3: Constants don't affect structural matching
class LoggerWithoutConstants {
    public function log(string $message, int $level): void {
        echo "Logging: $message\n";
    }
}

echo "\nLoggerWithoutConstants instanceof LoggerInterface: ";
var_dump((new LoggerWithoutConstants()) instanceof LoggerInterface);

?>
--EXPECT--
Direct constants:
LEVEL_INFO = 1
LEVEL_ERROR = 2
SimpleLogger instanceof LoggerInterface: bool(true)

Inherited and own constants:
DEFAULT_TIMEOUT = 30
MAX_CONNECTIONS = 100
MAX_RETRIES = 3
ConfigManager instanceof ExtendedConfig: bool(true)

LoggerWithoutConstants instanceof LoggerInterface: bool(true)
