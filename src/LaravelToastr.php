<?php

namespace Retinens\LaravelToastr;

use Illuminate\Support\Collection;

class LaravelToastr
{
    public Collection $toasts;

    public function __construct()
    {
        $this->toasts = collect();
    }

    public function info(string $message = null, string $title = null): static
    {
        return $this->toast($message, 'info', $title);
    }

    public function success(string $message = null, string $title = null): static
    {
        return $this->toast($message, 'success', $title);
    }

    public function error(string $message = null, string $title = null): static
    {
        return $this->toast($message, 'error', $title);
    }

    public function warning(string $message = null, string $title = null): static
    {
        return $this->toast($message, 'warning', $title);
    }

    public function title($title): static
    {
        $this->updateLastToast(["title" => $title]);
        return $this;
    }

    public function toast($message = null, $level = null, $title = null): static
    {
        // If the message is null, we update the level on the last one
        if (!$message) {
            return $this->updateLastToast(compact('level'));
        }
        if (!$message instanceof Toast) {
            $toast = new Toast(compact('message', 'level', 'title'));
            $this->toasts->push($toast);
        }

        return $this->flash();
    }

    protected function updateLastToast($overrides = []): static
    {
        $this->toasts->last()->update($overrides);
        return $this;
    }

    public function important(): static
    {
        $this->toasts->last()->autohide = false;
        return $this;
    }

    public function clear(): static
    {
        $this->toasts = collect();
        return $this;
    }

    protected function flash(): static
    {
        app()->session->flash('toasts', $this->toasts);
        return $this;
    }
}
