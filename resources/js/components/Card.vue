<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl text-80 font-light">{{this.options.title}}</h1>
            <div ref="chartContainer"></div>
            <!--<div id="container" style="margin: 20px; width: 200px; height: 70px;"></div>-->
            <!--<div id="container" class="m-2 w-32 h-16"></div>-->
        </div>
        <!--<button class="bg-white hover:bg-gray-100 text-80 font-semibold py-2 px-4 border border-gray-400 rounded shadow">Button</button>-->
    </card>
</template>

<script>
var ProgressBar = require('progressbar.js');


export default {
    props: [
        'card',
        // 'title',
    ],
    data () {
        return {
            
            options: {
                title: 'Progress Bar',
                strokeWidth: 0.5,
                color: '#FFEA82',
                percentage: 1.0,
                //     // color: '#007AFF',
            }
        }
    },
    mounted: function () {
        
        for (var key in this.card.options) {
            // check if the property/key is defined in the object itself, not in parent
            if (this.card.options.hasOwnProperty(key)) {           
                console.log(key, this.card.options[key]);
                this.options[key] = this.card.options[key];
            }
        }

        console.log(this.options);

        switch(this.card.type){
            case "circle":
            this.drawCircle(this.options);
            break;

            case "semi-circle":
            this.drawSemiCircle(this.options);
            break;

            default:
            this.drawLine(this.options);
            break;
        }
    },
    methods: {
        drawLine(options){
            var bar = new ProgressBar.Line(this.$refs.chartContainer, {

            strokeWidth: 4,
            easing: 'easeInOut',
            duration: 1400,
            color: this.options.color,
            trailColor: '#eee',
            trailWidth: 1,
            svgStyle: {width: '100%', height: '100%'},
            text: {
                style: {
                // Text color.
                // Default: same as stroke color (options.color)
                color: '#999',
                textAlign: 'center',
                position: 'relative',
                right: '0',
                top: '0',
                padding: 0,
                margin: 0,
                transform: null
                },
                autoStyleContainer: false
            },
            // from: {color: '#FFEA82'},
            // to: {color: '#ED6A5A'},
            step: (state, bar) => {
                bar.setText(Math.round(bar.value() * 100) + ' %');
            }
            });

            bar.animate(this.options.percentage);
        },
        drawSemiCircle(options){
            var bar = new ProgressBar.SemiCircle(this.$refs.chartContainer, {
            strokeWidth: 6,
            color: '#FFEA82',
            trailColor: '#eee',
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            svgStyle: null,
            // svgStyle: {height: '40%'},
            text: {
                value: '',
                alignToBottom: true
            },
            from: {color: '#FFEA82'},
            to: {color: '#ED6A5A'},
            // Set default step function for all animate calls
            step: (state, bar) => {
                bar.path.setAttribute('stroke', state.color);
                var value = Math.round(bar.value() * 100);
                if (value === 0) {
                    bar.setText('');
                } else {
                    bar.setText(value + ' %');
                }
                bar.text.style.color = state.color;
            }
            });
            // bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
            // bar.text.style.fontSize = '2rem';

            bar.animate(1.0);
        },

        drawCircle(options){
            var bar = new ProgressBar.Circle(this.$refs.chartContainer, {
            color: '#aaa',
            // This has to be the same size as the maximum width to
            // prevent clipping
            strokeWidth: 4,
            trailWidth: 1,
            easing: 'easeInOut',
            duration: 1400,
            // svgStyle: {width: '30%', height: '30%'},
            svgStyle: null,
            text: {
                autoStyleContainer: true
            },
            from: { color: '#aaa', width: 1 },
            to: { color: '#333', width: 4 },
            // Set default step function for all animate calls
            step: function(state, circle) {
                circle.path.setAttribute('stroke', state.color);
                circle.path.setAttribute('stroke-width', state.width);

                var value = Math.round(circle.value() * 100);
                if (value === 0) {
                    circle.setText('');
                } else {
                    circle.setText(value + ' %');
                }

            }
            });
            // bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
            // bar.text.style.fontSize = '2rem';

            bar.animate(1.0); 
        }

    }
}







</script>
