$(document).ready(function(){

//OWL slider
    if ($('#main_slider').length) {
        var owl = $('#main_slider');
        owl.owlCarousel({
            items:1,
            loop:true, //Зацикливаем слайдер
            autoplayHoverPause:true, //Остановка при наведении
            autoplay:true, //Автозапуск слайдера
            smartSpeed:2000, //Время движения слайда
            autoplayTimeout:5000, //Время смены слайда
        });
    }
    // Go to the next item
    $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
    })
    // Go to the previous item
    $('.customPrevBtn').click(function() {
        // With optional speed parameter
        // Parameters has to be in square bracket '[]'
        owl.trigger('prev.owl.carousel', [2000]);
    });

//Flipster coverflow
    if ($("#coverflow").length) {
        var coverflow = $("#coverflow").flipster({
            itemContainer: 'ul',
            // [string|object]
            // Selector for the container of the flippin' items.

            itemSelector: 'li',
            // [string|object]
            // Selector for children of `itemContainer` to flip

            start: 'center',
            // ['center'|number]
            // Zero based index of the starting item, or use 'center' to start in the middle

            fadeIn: 400,
            // [milliseconds]
            // Speed of the fade in animation after items have been setup

            loop: 2,
            // [true|false]
            // Loop around when the start or end is reached

            autoplay: 2500,
            // [false|milliseconds]
            // If a positive number, Flipster will automatically advance to next item after that number of milliseconds

            pauseOnHover: true,
            // [true|false]
            // If true, autoplay advancement will pause when Flipster is hovered

            style: 'infinite-carousel',
            // [coverflow|carousel|flat|...]
            // Adds a class (e.g. flipster--coverflow) to the flipster element to switch between display styles
            // Create your own theme in CSS and use this setting to have Flipster add the custom class

            spacing: -0.7,
            // [number]
            // Space between items relative to each item's width. 0 for no spacing, negative values to overlap

            click: true,
            // [true|false]
            // Clicking an item switches to that item

            keyboard: true,
            // [true|false]
            // Enable left/right arrow navigation

            scrollwheel: false,
            // [true|false]
            // Enable mousewheel/trackpad navigation; up/left = previous, down/right = next

            touch: true,
            // [true|false]
            // Enable swipe navigation for touch devices

            nav: false,
            // [true|false|'before'|'after']
            // If not false, Flipster will build an unordered list of the items
            // Values true or 'before' will insert the navigation before the items, 'after' will append the navigation after the items

            buttons: true,
            // [true|false|'custom']
            // If true, Flipster will insert Previous / Next buttons with SVG arrows
            // If 'custom', Flipster will not insert the arrows and will instead use the values of `buttonPrev` and `buttonNext`

            buttonPrev: 'Предыдущий',
            // [text|html]
            // Changes the text for the Previous button

            buttonNext: 'Следующий',
            // [text|html]
            // Changes the text for the Next button

            onItemSwitch: false
            // [function]
            // Callback function when items are switched
            // Arguments received: [currentItem, previousItem]
        });
    }
    $('#btnModal').click(function () {

        var wheel = new wheelnav("wheelDiv");
        wheel.wheelRadius = 260;
        wheel.centerX = 260;
        wheel.centerY = 180;
        // wheel.navAngle = 45;
        // wheel.wheelRadius = 150;
        wheel.sliceHoverAttr = { stroke: '#c0221f', 'stroke-width': 4 };
        wheel.lineHoverAttr = { stroke: '#c0221f', 'stroke-width': 3 };
        wheel.titleHoverAttr = { fill: '#c0221f', stroke: 'none' };
        wheel.sliceSelectedAttr = { stroke: '#e5dacc', 'stroke-width': 4 };
        wheel.lineSelectedAttr = { stroke: '#e5dacc', 'stroke-width': 4 };
        wheel.titleSelectedAttr = { fill: '#c0221f' };
        wheel.animatetime = 1000;
        wheel.animateeffect = 'easeInOut';
        wheel.colors = colorpalette.fractallove;
        wheel.sliceTransformFunction = sliceTransform().RotateTitleTransform;
        wheel.titleHeight=100;
        wheel.titleWidth=100;
        wheel.initWheel(["Индивидуальное\nжилье", "Жилые\nкомплексы", "Промышленные\nобъекты", "Развлекательные\nкомплексы"]);

        wheel.navItems[0].navigateFunction = function () { $('#tabNav a[href="#tabHome"]').tab("show") };
        wheel.navItems[1].navigateFunction = function () { $('#tabNav a[href="#tabKom"]').tab("show") };
        wheel.navItems[2].navigateFunction = function () { $('#tabNav a[href="#tabProm"]').tab("show") };
        wheel.navItems[3].navigateFunction = function () { $('#tabNav a[href="#tabRaz"]').tab("show") };
        wheel.createWheel();

        $('.bd-modal-lg').modal();
    });
});