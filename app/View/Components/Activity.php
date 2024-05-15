<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Activity extends Component
{
    public string $label;

    /**
     * Create a new component instance.
     */
    public function __construct(public \App\Enums\Activity $activity)
    {
        $this->setLabel();
    }

    public function setLabel()
    {
        $this->label = match ($this->activity) {
            \App\Enums\Activity::Teaching => __('Formazione'),
            \App\Enums\Activity::WebDeveloping => __('Sviluppo Web'),
            \App\Enums\Activity::DigitalMarketing => __('Digital Marketing'),
            \App\Enums\Activity::Localization => __('Traduzione'),
            \App\Enums\Activity::WebDesign => __('UX/UI Design'),
            default => ''
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.activity');
    }
}
