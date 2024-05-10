import './bootstrap';
import {gsap} from "gsap";

import {TextPlugin} from "gsap/TextPlugin";
import {ScrollTrigger} from "gsap/ScrollTrigger";
import Alpine from 'alpinejs';
import collapse from "@alpinejs/collapse";


gsap.registerPlugin(TextPlugin, ScrollTrigger);

gsap.from('header', {
    y: '-100%',
    duration: .5,
    opacity: 0
})
if (window.location.pathname === '/') {
    /**
     * ABOVE THE FOLD ANIMATIONS
     */
    gsap.fromTo('#image__to__rotate', {
        rotate: 0,
        x: '100%',
        y: '0%',
    }, {
        rotate: -360,
        x: '0%',
        y: '25%',
        duration: 1,
        ease: 'power3'
    });

    for (let i = 0; i < 4; i++) {
        gsap.from(`#service__${i + 1}`, {
            x: '100vh',
            opacity: 0,
            duration: .5,
            ease: 'power3',
            delay: .25 * i
        });
        gsap.to(`#service__${i + 1}`, {
            y: `+=${50 * i}`,
            scrollTrigger: {
                trigger: '#above__the__fold',
                start: 'top top',
                end: 'bottom 70%',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        })
        if (i === 3) break;
        gsap.from(`#long__service__title__${i + 1}`, {
            x: "-100%",
            opacity: 0,
            borderColor: '#fff',
            ease: 'power1.in',
            scrollTrigger: {
                trigger: `#long__service__title__${i + 1}`,
                start: 'top bottom',
                end: 'bottom bottom',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });
        gsap.from(`#long__service__body__${i + 1}`, {
            y: "100%",
            opacity: 0,
            scrollTrigger: {
                trigger: `#long__service__body__${i + 1}`,
                start: 'top bottom',
                end: 'bottom bottom',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });
    }

    gsap.from('h1, #page-title', {
        opacity: 0,
        duration: .8,
        delay: .25,
        x: '-100%',
    });
    gsap.to('h1,#page-title', {
        y: '-30%',
        scrollTrigger: {
            trigger: '#above__the__fold',
            start: 'top top',
            end: 'bottom 70%',
            scrub: 1,
            invalidateOnRefresh: true,
        }
    });
    gsap.from('.services', {
        x: '100%',
        opacity: 0,
        ease: 'sine.in',
        scrollTrigger: {
            trigger: '.services',
            start: 'top bottom',
            end: 'top 50%',
            scrub: 1,
            invalidateOnRefresh: true,
        }
    })
    gsap.timeline({
        scrollTrigger: {
            trigger: '#above__the__fold',
            start: 'top top',
            end: 'bottom top',
            endTrigger: '#image__to__rotate',
            scrub: 1,
            invalidateOnRefresh: true,
        }
    }).fromTo('#image__to__rotate', {
        rotate: -360,
        x: '0%',
        y: '25%',
    }, {
        rotate: 0,
        x: '100%',
        y: '0%',
        opacity: 0
    });

    gsap.from(
        '#method *',
        {
            opacity: 0,
            y: '-100',
            scrollTrigger: {
                trigger: '#method',
                start: 'top bottom',
                end: 'top 70%',
                scrub: 1,
                invalidateOnRefresh: true,

            }
        }
    )

    gsap.to('#section-4', {
        duration: 4,
        ease: 'none',
        text: {
            value: 'Guidiamo il tuo business oltre i confini: dall\'innovazione tecnica alla conquista dei mercati globali.',
        },
        scrollTrigger: {
            trigger: '#section-4',
            start: 'top bottom',
            end: 'top 30%',
            scrub: true,
            invalidateOnRefresh: true,
        }
    });
    gsap.from('#section-4-left, #section-4-right', {
        y: -250,
        opacity: 0,
        ease: 'power2.out',
        scrollTrigger: {
            trigger: '#section-4-left',
            start: 'top bottom',
            end: 'top 30%',
            scrub: true,
            invalidateOnRefresh: true,
        }
    },);

    gsap.from('#bulbs', {
        opacity: 0,
        y: "-70%",
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '#bulbs',
            start: 'top bottom',
            end: 'top 30%',
            scrub: true,
            invalidateOnRefresh: true,
        }
    });
}

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();
