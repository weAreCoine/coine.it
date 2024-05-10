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
});

switch (window.location.pathname) {
    case "/":
        import("./animations/home.js").then(module => {
            module.default();
        });
        break;
}

window.Alpine = Alpine;
Alpine.plugin(collapse);
Alpine.start();
