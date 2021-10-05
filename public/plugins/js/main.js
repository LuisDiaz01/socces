var $chart = $('#chart');
var $ordersSelect = $('[name="ordersSelect"]');
var labelItem=[];
var dataItem=[];
var ChartColor = ["#5D62B4","#54C3BE","#EF726F","#F9C512","#A9C132","#21B7EC","#04BCCC","#14BACC"];
var color=[ChartColor[0],ChartColor[1],ChartColor[2],ChartColor[3],ChartColor[4],ChartColor[5],ChartColor[6],ChartColor[7]];
$.ajax({
	type: "GET",
	url: APP_URL+"/Chart",
	dataType: "json",
	success: function (response) {
		labelItem=response.label;
		dataItem=response.data;
		if ($("#chart").length) {
    var barChartCanvas = $("#chart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: {
        labels: labelItem,
        datasets: [{
          data: dataItem,
          backgroundColor: color,
          borderColor: color,
          borderWidth: 0
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Sales by year',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 150,
              autoSkip: true,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'revenue by sales',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              display: true,
              autoSkip: false,
              maxRotation: 0,
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 150
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
  }
	}
});

