<?php

namespace Retinens\LaravelToastr\Http\Components;

use Illuminate\View\Component;

class ToastrComponent extends Component
{
    public string $xPosition = '';
    public string $yPosition = '';
    public bool $autoHide = true;

    public function __construct()
    {
        $this->xPosition = config('toastr.position_x', 'end');
        $this->yPosition = config('toastr.position_y', 'bottom');
        $this->autoHide = config('toastr.auto_hide', true);
    }

    public function render()
    {
        return view('toastr::message');
    }
}
