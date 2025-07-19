<?php

namespace App\Services;

use App\Data\ServiceResponseData;
use Illuminate\Support\Facades\Log;

abstract class BaseService
{
    protected function log(string $type, string $message): void
    {
        Log::{$type}($this->constructMessage($message));
    }

    protected function info(string $message, mixed $data = null): void
    {
        $this->log('info', $this->constructMessage($message, $data));
    }

    protected function error(string $message, mixed $data = null): void
    {
        $this->log('error', $this->constructMessage($message, $data));
    }

    protected function warning(string $message, mixed $data = null): void
    {
        $this->log('warning', $this->constructMessage($message, $data));
    }

    protected function successResponse(string $message, mixed $data = null, int $status = 200): ServiceResponseData
    {
        $this->info($message);
        return ServiceResponseData::success($message, $data, $status);
    }

    protected function errorResponse(string $message, int $status = 500, mixed $data = null): ServiceResponseData
    {
        $this->error($message);
        return ServiceResponseData::error($message, $status, $data);
    }

    private function addTimestamp(string $message): string
    {
        return "[" . now()->format('Y-m-d H:i:s') . "] $message";
    }

    private function addClassName(string $message): string
    {
        return "[" . static::class . "] $message";
    }
    private function constructMessage(string $message, mixed $data = null): string
    {
        return $this->addTimestamp($this->addClassName($message)) . ($data ? " - " . json_encode($data) : "");
    }
}
