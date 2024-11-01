gsap.registerPlugin(ScrollTrigger);


gsap.to('progress.progress-line', {
    value: 100,
    ease: 'none',
    scrollTrigger: { 
    trigger: "html",
        scrub: true,
        start: "top top",
        end: "bottom bottom",
    }
});



ScrollTrigger.create({
    start: "top top",
    end: "bottom -5%",
    trigger: "html",
    toggleClass: {
        targets: "#bttp",
        className: "show",
    }
});



  





