<?php

namespace App\View\Components;

use App\Enums\Activity as Activity;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\Component;

class ClientsList extends Component
{
    public Collection $files;

    public array $activities = [
        'adecco' => [Activity::Teaching],
        'mylia' => [Activity::Teaching],
        'zara' => [Activity::Teaching],
        'digital_update' => [Activity::Teaching],
        'dove_conviene' => [Activity::Teaching],
        'ca_foscari' => [Activity::Teaching],
        'cyclando' => [Activity::DigitalMarketing],
        'marchesini' => [Activity::DigitalMarketing],
        'visit_flanders' => [Activity::DigitalMarketing],
        'anastasis' => [Activity::DigitalMarketing, Activity::WebDeveloping, Activity::Teaching],
        'arte_pura' => [Activity::DigitalMarketing, Activity::WebDeveloping],
        'tailoor' => [Activity::DigitalMarketing, Activity::WebDeveloping],
        'elisacavaletti' => [Activity::WebDeveloping],
        'cna' => [Activity::WebDeveloping, Activity::WebDesign],
        'progetto_sisma' => [Activity::WebDeveloping, Activity::WebDesign, Activity::Localization],

    ];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->files = collect(Storage::disk('public')->allFiles('images/clients'))
            ->shuffle()->take(8)
            ->map(fn (string $path) => asset('storage/'.$path));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.clients-list');
    }
}
