<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $validated = $request->validated();
        $validated['services'] = explode('_', $validated['services']);

        Contact::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'services' => json_encode($validated['services']),
            'phone' => $validated['phone'],
            'budget' => $validated['budget'],
            'note' => $validated['content'],
        ]);

        session()->flash('success', __('Messaggio inviato con successo! Ti scriveremo al più presto.'));

        return redirect()->route('home');
    }

    public function view()
    {
        $selectedServices = old('selectedServices', ['website']);
        if (is_string($selectedServices)) {
            $selectedServices = empty($selectedServices) ? [] : explode('_', $selectedServices);
        }

        return view('projects')->with([
            'data' => json_encode([
                'firstName' => old('firstName', 'Luca'),
                'lastName' => old('lastName', 'Barbi'),
                'email' => old('email', 'luca@coine.it'),
                'phone' => old('phone', '3454476837'),
                'content' => old('content', 'Messaggio di prova'),
                'selectedBudget' => old('selectedBudget', 2),
                'selectedServices' => $selectedServices,
                'servicesChips' => [
                    'webDesign' => __('UX/UI Design'),
                    'translation' => __('Traduzione'),
                    'contentWriting' => __('Content Writing'),
                    'website' => __('Web Development'),
                    'onlineMarketing' => __('Online Marketing'),
                    'flutterApp' => __('App Flutter'),
                    'teaching' => __('Formazione'),
                    'adsStrategy' => __('Strategia Marketing'),
                ],
                'faqs' => [
                    [
                        'question' => __('Accettate un compenso in percentuale sul fatturato?'),
                        'answer' => __('No. Questo tipo di accordi ha tantissimi limiti, possibili conflitti di interesse e altre criticità. Preferiamo dimostrare la fiducia che riponiamo nelle nostre capacità stipulando contratti che lasciano le mani di entrambe le parti libere di svincolarsi qualora non si lavorasse bene insieme.'),
                    ],
                    [
                        'question' => __('Quali son'),
                        'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
                    ],
                    [
                        'question' => 'How can we start a project together?',
                        'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
                    ],
                    [
                        'question' => 'How can we start a project together?',
                        'answer' => 'Great question! The first step is to get in touch by filling out our contact form, which you’ll find here. We usually start our projects with a discovery call, followed by a short exploration phase where we work with you to define the project scope and services we can help you with. We’ll then share our cost estimate, prepare a statement of work, and schedule kickoff calls with our teams. Once the paperwork is complete and the deposit payment is settled, we get to work!',
                    ],
                ],
            ]),
        ]);
    }
}
