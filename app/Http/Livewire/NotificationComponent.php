<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NotificationComponent extends Component
{
    public $postNotifications;

    public function render()
    {
        return view('livewire.notification-component')->extends('layouts.app');
    }

    public function mount()
    {
        $this->postNotifications = auth()->user()->unreadNotifications;
    }
}
