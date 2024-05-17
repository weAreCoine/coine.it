import {gsap} from "gsap";

import {TextPlugin} from "gsap/TextPlugin";
import {ScrollTrigger} from "gsap/ScrollTrigger";

gsap.registerPlugin(TextPlugin, ScrollTrigger);


export default function homeAnimations() {

    const mm = gsap.matchMedia();

    mm.add('(max-width:1023px)', () => {
        gsap.fromTo('#image__to__rotate', {
            rotate: 0,
            x: '100%',
            y: '0%',
        }, {
            rotate: -410,
            x: '0%',
            y: '5%',
            duration: 1,
            ease: 'power3'
        });
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
            rotate: -410,
            x: '0%',
            y: '5%',
        }, {
            rotate: 0,
            x: '100%',
            y: '0%',
            opacity: 0
        });
        gsap.from('h1, #page-title', {
            opacity: 0,
            duration: .8,
            delay: .25,
            x: '-100%',
        });

        gsap.to('h1', {
            y: '-30%',
            scrollTrigger: {
                trigger: '#above__the__fold',
                start: 'top top',
                end: 'bottom 70%',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });
        gsap.to('#page-title', {
            y: '-100%',
            scrollTrigger: {
                trigger: '#above__the__fold',
                start: 'top top',
                end: 'bottom 70%',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });
        for (let i = 0; i < 4; i++) {
            gsap.from(`#service__${i + 1}`, {
                x: '100%',
                scrollTrigger: {
                    trigger: `#service__${i + 1}`,
                    start: 'top bottom',
                    end: 'bottom bottom',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            })


        }
        gsap.from('#method .column__image', {
            y: '-70%',
            scale: 1.3,
            opacity: 0,
            scrollTrigger: {
                trigger: '#method .column__image',
                start: 'top bottom',
                end: 'center center',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });

        gsap.from('#method .column__copy', {
            opacity: 0,
            y: '10%',
            scrollTrigger: {
                trigger: '#method .column__copy',
                start: 'top bottom',
                end: 'top center',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });

        for (let i = 0; i < 3; i++) {
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
                x: "100%",
                opacity: 0,
                scrollTrigger: {
                    trigger: `#long__service__body__${i + 1}`,
                    start: 'top bottom',
                    end: 'top center',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            });
        }

    });


    const clientsCards = document.querySelectorAll('.client__card');
    const clientsCount = clientsCards.length;
    for (let i = 0; i < clientsCount; i++) {
        gsap.from(
            clientsCards[i], {
                x: [0, 1, 4, 5].includes(i) ? -window.innerWidth : window.innerWidth,
                scrollTrigger: {
                    trigger: clientsCards[i],
                    start: 'top bottom',
                    end: 'top center',
                    scrub: 1.5 - (i % 2) / 2,
                    invalidateOnRefresh: true,
                    markers: false,
                }
            }
        )
    }


    mm.add('(min-width: 1024px', () => {
        /**
         * ABOVE THE FOLD ANIMATIONS
         */
        gsap.fromTo('#image__to__rotate', {
            rotate: 0,
            x: '100%',
            y: '0%',
        }, {
            rotate: -410,
            x: '0%',
            y: '12%',
            duration: 1,
            ease: 'power3'
        });
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
            rotate: -410,
            x: '0%',
            y: '12%',
        }, {
            rotate: 0,
            x: '100%',
            y: '0%',
            opacity: 0
        });

        gsap.from('h1, #page-title', {
            opacity: 0,
            duration: .8,
            delay: .25,
            x: '-100%',
        });

        gsap.to('h1, #page-title', {
            y: '-30%',
            scrollTrigger: {
                trigger: '#above__the__fold',
                start: 'top top',
                end: 'bottom 70%',
                scrub: 1,
                invalidateOnRefresh: true,
            }
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
                x: "100%",
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

        gsap.from('#method .column__copy', {
            x: '50%',
            y: '-20%',
            opacity: 0,
            scrollTrigger: {
                trigger: '#method .column__copy',
                start: 'top bottom',
                end: 'center center',
                scrub: 1,
                invalidateOnRefresh: true,
            }
        });
        gsap.from('#method .column__image', {
            y: '100%',
            scale: .6,
            opacity: 0,
            scrollTrigger: {
                trigger: '#method .column__copy',
                start: 'top bottom',
                end: 'center center',
                scrub: 1,
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


        gsap.from(
            '#clients__title', {
                opacity: 0,
                scrollTrigger: {
                    trigger: '#clients__title',
                    start: 'top bottom',
                    end: 'top center',
                    scrub: 1,
                    invalidateOnRefresh: true,
                }
            }
        )

    });

    mm.add('(min-height: 1100px) and (min-width:1024px)', () => {
        for (let i = 0; i < 3; i++) {


            gsap.to(`#long__service__container__${i + 1}`, {
                opacity: 0,
                ease: 'expo.in',
                delay: 19,
                scrollTrigger: {
                    trigger: `#long__service__container__${i + 1}`,
                    start: 'top center',
                    end: 'bottom top',
                    pin: true,
                    scrub: true,
                    pinSpacing: true,
                    invalidateOnRefresh: true,
                }
            });
        }

        gsap.timeline({
            scrollTrigger: {
                trigger: '.services',
                endTrigger: '#section__4__container',
                start: `top ${document.querySelector('header').getBoundingClientRect().height}`,
                end: 'top center',
                scrub: 1,
                pin: '.services',
                pinSpacing: false,
                anticipatePin: true,
                invalidateOnRefresh: true,
                markers: false,
            }
        });

    });

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

}
