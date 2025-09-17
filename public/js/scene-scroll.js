if (ScrollMagic) {
    var controller = new ScrollMagic.Controller();

    var sceneScroll = new ScrollMagic.Scene({triggerElement: "#five", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bg-fix-new", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);

    var scene = new ScrollMagic.Scene({triggerElement: "#tifia-more-info", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bg-fix-tifia", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);

    var scene = new ScrollMagic.Scene({triggerElement: "#legal-info-page", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bg-fix-legal", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);

    var scene = new ScrollMagic.Scene({triggerElement: "#trading-acc", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bg-fix-chess", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);

    var scene = new ScrollMagic.Scene({triggerElement: "#conditions-bonus", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bonus-promo-bg-fix", {backgroundColor: "#333333"}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);


    var animation_bg_partners = new TimelineMax();
    animation_bg_partners
        .from('.bg-fix-partners-lvl', 1, {autoAlpha: 0});

    var scene = new ScrollMagic.Scene({triggerElement: "#partners-lvl", duration: 500})
        .setTween(animation_bg_partners)
        .addTo(controller);

    var animation_bg_grey = new TimelineMax();
    animation_bg_grey
        .to('.bg-fix-partners-lvl', 1, {autoAlpha: 0});

    var scene = new ScrollMagic.Scene({triggerElement: "#partners-calculator-block", duration: 500})
        .setTween(animation_bg_grey)
        .addTo(controller);

    var animation_bg_tifia = new TimelineMax();
    animation_bg_tifia
        .from('.bg-fix-tifia-flag', 5, {autoAlpha: 0})
        .to('.bg-fix-tifia-flag', 5, {autoAlpha: 0.5});
    /*.to('#partners-reg-form', 14, {transform:"scale(1)", autoAlpha: 1, delay:10})*/
    /*.to('#partners-reg-form', 14, {autoAlpha: 1, delay:10})
    .to('#partners-reg-form', 3, {autoAlpha: 0, delay: 3});*/

    var scene = new ScrollMagic.Scene({triggerElement: ".partners-reg", duration: 900})
        .setTween(animation_bg_tifia)
        .addTo(controller);

    var animation_form_partners = new TimelineMax();
    animation_form_partners.set('#partners-form', {autoAlpha: 0})
        .to('#partners-form', 30, {autoAlpha: 1})
        .to('#partners-form', 8, {delay: 9});
    /*.to('#partners-reg-form', 14, {transform:"scale(1)", autoAlpha: 1, delay:10})*/
    /*.to('#partners-reg-form', 14, {autoAlpha: 1, delay:10})
    .to('#partners-reg-form', 3, {autoAlpha: 0, delay: 3});*/

    var scene = new ScrollMagic.Scene({triggerElement: ".steps-ul", duration: 1300})
        .setTween(animation_form_partners)
        .addTo(controller);

    var animation_bg_grey_simple = new TimelineMax();
    animation_bg_grey_simple
        .from('.bg-fix-grey-bg', 1, {autoAlpha: 0});

    var scene = new ScrollMagic.Scene({triggerElement: "footer", duration: 500})
        .setTween(animation_bg_grey_simple)
        .addTo(controller);

    /*var tween = TweenMax.from(".bg-fix-tifia-social", 1, {autoAlpha: 0});*/


    var animation_title_investors = new TimelineMax();
    animation_title_investors
        .from('.bg-fix-tifia-social', 1, {autoAlpha: 0});
    /*.from('.investors-block h2', 1, {yPercent: 100, autoAlpha: 0}, {yPercent: 0, autoAlpha: 1});*/

    var scene = new ScrollMagic.Scene({triggerElement: "#investors-block", duration: 500})
        .setTween(animation_title_investors)
        .addTo(controller);

// build timeline with animation tweens
    /*var scrollAnimationInvestors = new TimelineMax();
    scrollAnimationInvestors
        .from('.step1', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step1 h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step1', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step2', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step2 h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step2', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step3', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step3 h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step3', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step4', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step4 h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step4', 1, {yPercent: -100, autoAlpha: 0});

    var scene = new ScrollMagic.Scene({triggerElement: "#investors-block", duration: 4000})
        .setPin("#investors-block")
        .addTo(controller)
        .setTween(scrollAnimationInvestors);
    scene.offset(400);*/

    var animation_title_traders = new TimelineMax();
    animation_title_traders
        .from('.bg-fix-tifia-social-more', 1, {autoAlpha: 0});
    /*.from('.traders-block h2', 1, {yPercent: 100, autoAlpha: 0}, {yPercent: 0, autoAlpha: 1})*/

    var scene = new ScrollMagic.Scene({triggerElement: "#traders-block", duration: 500})
        .setTween(animation_title_traders)
        .addTo(controller);

    /*var scrollAnimationTraders = new TimelineMax();
    scrollAnimationTraders
        .from('.step1-tr', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step1-tr h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step1-tr', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step2-tr', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step2-tr h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step2-tr', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step3-tr', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step3-tr h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step3-tr', 1, {yPercent: -100, autoAlpha: 0})
        .from('.step4-tr', 1, {yPercent: 100, autoAlpha: 0})
        .to('.step4-tr h3', 0, {color: "rgb(255, 255, 255)"})
        .to('.step4-tr', 1, {yPercent: -100, autoAlpha: 0});*/


    var tween_grey = TweenMax.from(".grey-bg", 1, {autoAlpha: 0});

    /*var scene = new ScrollMagic.Scene({triggerElement: "#traders-block", duration: 4000})
        .setPin("#traders-block")
        .addTo(controller)
        .setTween( scrollAnimationTraders);
    scene.offset(400);*/


    var scene = new ScrollMagic.Scene({triggerElement: "#grey-block", duration: 500})
        .setTween(tween_grey)
        .addTo(controller);


    var scene = new ScrollMagic.Scene({triggerElement: "#luxurious-house", duration: 500})
        .setTween(".bg-grey-house", {backgroundColor: "transparent"})
        .addTo(controller);



    var scene = new ScrollMagic.Scene({triggerElement: "#car-section", duration: 500})
        .setTween(".pajero-bg", {opacity: 1})
        .addTo(controller);


    var scene = new ScrollMagic.Scene({triggerElement: "#tour-section", duration: 300})
        .setTween(".grey-bg-map", {opacity: 1})
        .addTo(controller);

    var scene = new ScrollMagic.Scene({triggerElement: "#grey-bg-contest", duration: 300})
        .setTween(".grey-bg-contest", {opacity: 1})
        .addTo(controller);


    /*var scene = new ScrollMagic.Scene({triggerElement: "#investors-block", duration: 500})
    // animate color and top border in relation to scroll position
        .setTween(".bg-fix-social", {autoAlpha: 0}) // the tween durtion can be omitted and defaults to 1
        .addTo(controller);
    var tween = TweenMax.to('.bg-fix-social', 0.5, {
        backgroundColor: 'rgb(255, 39, 46)',
        scale: 5,
        rotation: 360
    });

    var scene = new ScrollMagic.Scene({
        triggerElement: '#investors-block',
        duration: 300
    })
        .setTween(tween)
        .addTo(controller);*/
}
