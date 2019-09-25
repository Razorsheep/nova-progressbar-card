<template>
  <card class="flex flex-col items-center justify-center">
    <div class="px-3 py-3">
      <h1 class="text-center text-3xl text-80 font-light">{{this.options.title}}</h1>
      <div ref="chartContainer"></div>
    </div>
  </card>
</template>

<script>
var ProgressBar = require("progressbar.js");

export default {
  props: ["card"],
  data() {
    return {
      options: {
        title: "Progress Bar",
        strokeWidth: 4,
        color: "#FFEA82",
        percentage: 1.0,
        type: "line"
      }
    };
  },
  mounted: function() {
    for (var key in this.card.options) {
      if (this.card.options.hasOwnProperty(key)) {
        this.options[key] = this.card.options[key];
      }
    }
    switch (this.options.type) {
      case "semi-circle":
        this.drawSemiCircle();
        break;

      default:
        this.drawLine();
        break;
    }
  },
  methods: {
    drawLine(options) {
      var bar = new ProgressBar.Line(this.$refs.chartContainer, {
        strokeWidth: this.options.strokeWidth,
        easing: "easeInOut",
        duration: 1400,
        color: this.options.color,
        trailColor: "#eee",
        trailWidth: 1,
        svgStyle: { width: "100%", height: "100%" },
        text: {
          style: {
            color: "#999",
            textAlign: "center",
            position: "relative",
            right: "0",
            top: "0",
            padding: 0,
            margin: 0,
            transform: null
          },
          autoStyleContainer: false
        },
        from: { color: this.options.fromColor },
        to: { color: this.options.toColor },
        step: (state, bar) => {
          bar.path.setAttribute("stroke", state.color);
          var value = Math.round(bar.value() * 100);
          if (value === 0) {
            bar.setText("");
          } else {
            bar.setText(value + " %");
          }
          bar.text.style.color = state.color;
          //   bar.setText(Math.round(bar.value() * 100) + " %");
        }
      });

      bar.animate(this.options.percentage);
    },
    drawSemiCircle(options) {
      var bar = new ProgressBar.SemiCircle(this.$refs.chartContainer, {
        strokeWidth: this.options.strokeWidth,
        color: this.options.color,
        trailColor: "#eee",
        trailWidth: 1,
        easing: "easeInOut",
        duration: 1400,
        svgStyle: null,
        text: {
          value: "",
          alignToBottom: true
        },
        from: { color: this.options.fromColor },
        to: { color: this.options.toColor },
        step: (state, bar) => {
          bar.path.setAttribute("stroke", state.color);
          var value = Math.round(bar.value() * 100);
          if (value === 0) {
            bar.setText("");
          } else {
            bar.setText(value + " %");
          }
          bar.text.style.color = state.color;
        }
      });
      // bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
      // bar.text.style.fontSize = '2rem';

      bar.animate(this.options.percentage);
    }
  }
};
</script>
