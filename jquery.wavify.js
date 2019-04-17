/*
*   Wavify
*   Jquery Plugin to make some nice waves
*/
(function ( $ ) {

    $.fn.wavify = function( options ) {

        //  Options
        //
        //
        var settings = $.extend({
            container: options.container ? options.container : 'body',
            // Height of wave
            height: 200,
            // Amplitude of wave
            amplitude: 100,
            // Animation speed
            speed: .15,
            // Total number of articulation in wave
            bones: 3,
            // Color
            color: 'rgba(255,255,255, 0.20)'
        }, options );

        var wave = this,
            width = $(settings.container).width()*1.5,
            height = $(settings.container).height(),
            points = [],
            lastUpdate,
            totalTime = 0;

        //  Set color
        //
        TweenLite.set(wave, {attr:{fill: settings.color}});


        function drawPoints(factor) {
            var points = [];

            for (var i = 0; i <= settings.bones; i++) {
                var x = i/settings.bones * width;
                var sinSeed = (factor + (i + i % settings.bones)) * settings.speed * 100;
                var sinHeight = Math.sin(sinSeed / 100) * settings.amplitude;
                var yPos = Math.sin(sinSeed / 100) * sinHeight  + settings.height;
                points.push({x: x, y: yPos});
            }

            return points;
        }

        function drawPath(points) {
            var SVGString = 'M ' + points[0].x + ' ' + points[0].y;

            var cp0 = {
                x: (points[1].x - points[0].x) / 2,
                y: (points[1].y - points[0].y) + points[0].y + (points[1].y - points[0].y)
            };

            SVGString += ' C ' + cp0.x + ' ' + cp0.y + ' ' + cp0.x + ' ' + cp0.y + ' ' + points[1].x + ' ' + points[1].y;

            var prevCp = cp0;
            var inverted = -1;

            for (var i = 1; i < points.length-1; i++) {
                var cpLength = Math.sqrt(prevCp.x * prevCp.x + prevCp.y * prevCp.y);
                var cp1 = {
                    x: (points[i].x - prevCp.x) + points[i].x,
                    y: (points[i].y - prevCp.y) + points[i].y
                };

                SVGString += ' C ' + cp1.x + ' ' + cp1.y + ' ' + cp1.x + ' ' + cp1.y + ' ' + points[i+1].x + ' ' + points[i+1].y;
                prevCp = cp1;
                inverted = -inverted;
            }

            SVGString += ' L ' + width + ' ' + height;
            SVGString += ' L 0 ' + height + ' Z';
            return SVGString;
        }

        //  Draw function
        //
        //
        function draw() {
            var now = window.Date.now();

            if (lastUpdate) {
                var elapsed = (now-lastUpdate) / 1000;
                lastUpdate = now;

                totalTime += elapsed;

                var factor = totalTime*Math.PI;
                TweenMax.to(wave, settings.speed, {
                    attr:{
                        d: drawPath(drawPoints(factor))
                    },
                    ease: Power1.easeInOut
                });

            } else {
                lastUpdate = now;
            }

            requestAnimationFrame(draw);
        }

        //  Pure js debounce function to optimize resize method
        //
        //
        function debounce(func, wait, immediate) {
            var timeout;
            return function() {
                var context = this, args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    timeout = null;
                    if (!immediate) func.apply(context, args);
                }, wait);
                if (immediate && !timeout) func.apply(context, args);
            };
        }

        //  Redraw for resize with debounce
        //
        var redraw = debounce(function() {
            wave.attr('d', '');
            points = [];
            totalTime = 0;
            width = $(settings.container).width();
            height = $(settings.container).height();
            lastUpdate = false;
            setTimeout(function(){
                draw();
            }, 50);
        }, 250);
        $(window).on('resize', redraw);


        //  Execute
        //
        return draw();

    };

}(jQuery));


$('#feel-the-wave').wavify({
  height: 680,
  // height: 580,
  bones: 8,
  amplitude: 100,
  color: 'rgba(18,231,224,0.6)',
  speed: .20,
    // color: 'linear-gradient(45deg, #b3ffab 0%, #12fff7 100%)'
});

$('#feel-the-wave-two').wavify({
  // height: 550,
  height: 700,
  bones: 6,
  amplitude: 70,
  color: 'rgba(165,237,158,0.5)',
  //   color: 'linear-gradient(45deg, #b3ffab 0%, #12fff7 100%)',
  speed: .35
});

$('#feel-the-wave-three').wavify({
  // height: 580,
  height: 730,
  bones: 10,
  amplitude: 50,
    // color: 'linear-gradient(45deg, #b3ffab 0%, #12fff7 100%)',
  color: 'rgba(8,174,234,0.2)',
// background: '-webkit-gradient(l
// inear, left top, left bottom, from(#b3ffab), to(#12fff7))',
// background-image: linear-gradient(45deg, #b3ffab 0%, #12fff7 100%)
  speed: .25
});

$('#generate-wave-1').wavify({
    height: 680,
    bones: 8,
    amplitude: 100,
    speed: .20,
});

$('#generate-wave-2').wavify({
    height: 700,
    bones: 6,
    amplitude: 70,
    speed: .35
});

$('#generate-wave-3').wavify({
    height: 730,
    bones: 10,
    amplitude: 50,
    speed: .25
});

$('#generate-wave-4').wavify({
    height: 650,
    bones: 3,
    amplitude: 60,
    speed: .23,
});

$('#generate-wave-5').wavify({
    height: 710,
    bones: 7,
    amplitude: 180,
    speed: .30,
});


$('.pink-wave1').wavify({
    height: 830,
    bones: 10,
    amplitude: 50,
    color: 'rgba(250,208,196,0.2)',
    speed: .1
});

$('.beige-wave1').wavify({
    // height: 580,
    height: 800,
    bones: 8,
    amplitude: 100,
    color: 'rgba(226,209,195,0.5)',
    speed: .1
});

$('.orange-wave1').wavify({
    // height: 580,
    height: 780,
    bones: 6,
    amplitude: 70,
    color: 'rgba(252,182,159,0.6)',
    speed: .1
});

//
// $('#feel-the-wave-four').wavify({
//   height: 600,
//   bones: 10,
//   amplitude: 40,
//   color: 'rgba(165,237,158,0.4)',
//     // color: 'pink',
//   speed: .25
// });
//
// $('#feel-the-wave-five').wavify({
//   height: 610,
//   bones: 10,
//   amplitude: 80,
//   color: 'rgba(8,174,234,0.2)',
//   // color: 'pink',
//   speed: .25
// });
//
// $('#feel-the-wave-six').wavify({
//   height: 650,
//   bones: 8,
//   amplitude: 60,
//   color: 'rgba(18,231,224,0.6)',
//   speed: .35
// });
