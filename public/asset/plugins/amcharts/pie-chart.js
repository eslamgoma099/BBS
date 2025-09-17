var chart = AmCharts.makeChart("piechart", {
  "type": "pie",
  "startDuration": 0,
  "theme": "light",
  "addClassNames": true,
  "legend":{
   	"position":"right",
    "marginRight":50,
    "autoMargins":false
  },
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [
  {
    "shares": "BTC",
    "percentage": 21,
    "fill": "#6a7179"
  }, {
    "shares": "XRP",
    "percentage": 16,
    "fill": "#89929f"
  }, {
    "shares": "LTH",
    "percentage": 11,
    "fill": "#6cd086"
  }, {
    "shares": "ETH",
    "percentage": 11,
    "fill": "#2735b5"
  }, {
    "shares": "EOS",
    "percentage": 10,
    "fill": "#a8b3c5"
  }],
  "valueField": "percentage",
  "titleField": "shares",
  "colorField": "fill",
  "export": {
    "enabled": true
  }
});

var chart = AmCharts.makeChart("piechart_2", {
  "type": "pie",
  "startDuration": 0,
  "theme": "light",
  "addClassNames": true,
  "innerRadius": "30%",
  "defs": {
    "filter": [{
      "id": "shadow",
      "width": "200%",
      "height": "200%",
      "feOffset": {
        "result": "offOut",
        "in": "SourceAlpha",
        "dx": 0,
        "dy": 0
      },
      "feGaussianBlur": {
        "result": "blurOut",
        "in": "offOut",
        "stdDeviation": 5
      },
      "feBlend": {
        "in": "SourceGraphic",
        "in2": "blurOut",
        "mode": "normal"
      }
    }]
  },
  "dataProvider": [
  {
    "shares": "BTC",
    "percentage": 21,
    "fill": "#6a7179"
  }, {
    "shares": "XRP",
    "percentage": 16,
    "fill": "#89929f"
  }, {
    "shares": "LTH",
    "percentage": 11,
    "fill": "#6cd086"
  }, {
    "shares": "ETH",
    "percentage": 11,
    "fill": "#2735b5"
  }, {
    "shares": "EOS",
    "percentage": 10,
    "fill": "#a8b3c5"
  }],
  "valueField": "percentage",
  "titleField": "shares",
  "colorField": "fill",
  "export": {
    "enabled": true
  }
});

chart.addListener("init", handleInit);

chart.addListener("rollOverSlice", function(e) {
  handleRollOver(e);
});

function handleInit(){
  chart.legend.addListener("rollOverItem", handleRollOver);
}

function handleRollOver(e){
  var wedge = e.dataItem.wedge.node;
  wedge.parentNode.appendChild(wedge);
}