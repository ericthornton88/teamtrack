
var chartData = [];
// var lineChartData = {
// 	labels : ["January","February","March","April","May","June","July"],
// 	datasets : chartData//[
// 		// {
// 		// 	label: "Sleep Length",
// 		// 	// fillColor : "yellow",
// 		// 	strokeColor : "yellow",
// 		// 	// pointColor : "rgba(220,220,220,1)",
// 		// 	// pointStrokeColor : "yellow",
// 		// 	// pointHighlightFill : "#fff",
// 		// 	// pointHighlightStroke : "yellow",
// 		// 	data : [65, 59, 80, 81, 56, 55, 40]
// 		// },
// 		// {
// 		// 	label: "My Third dataset",
// 		// 	fillColor : "rgba(151,187,205,0.2)",
// 		// 	strokeColor : "rgba(151,187,205,1)",
// 		// 	pointColor : "rgba(151,187,205,1)",
// 		// 	pointStrokeColor : "#fff",
// 		// 	pointHighlightFill : "#fff",
// 		// 	pointHighlightStroke : "rgba(151,187,205,1)",
// 		// 	data : [28, 90, 90, 90, 90, 90, 90]
// 		// }
// 	//]
// };
	

window.onload = function(){
	$.get( "/api/chartData", function( data ) {
		var lineChartData = {
			labels : data[0],
			datasets : [
				{
					label: "Overall",
					fillColor : "transparent",
					strokeColor : "green",
					data : data[1]
				}
			],
		};
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
			animation: false,
			bezierCurve : false,
			datasetFill : false,
		});
	});
}

$(function() {
  	$('input').on('click', function() {
  		var metric = $(this).val();
  		var color = '';
  		if (metric == 'overall') {
  			color = 'green'
  		} else if (metric == 'sleep_length') {
  			color = 'red'
  		} else if (metric == 'sleep_quality') {
  			color = 'blue'
  		} else if (metric == 'tired_sensation') {
  			color = 'pink'
  		} else if (metric == 'training_willingness') {
  			color = 'purple'
  		} else if (metric == 'appetite') {
  			color = 'yellow'
  		} else if (metric == 'soreness') {
  			color = 'orange'
  		} else if (metric == 'nutrition') {
  			color = 'lightblue'
  		}

  		if (metric == 'overall') {
  			var url = "/api/chartData"
  		} else {
  			var url = "/api/chartData/" + metric
  		}
  	  	$.get( url , function( data ) {
			var lineChartData = {
				labels : data[0],
				datasets : [
					{
						strokeColor : color,
						data : data[1]
					},
				]
			};
			var ctx = document.getElementById("canvas").getContext("2d");
			window.myLine = new Chart(ctx).Line(lineChartData, {
				responsive: true,
				animation: false,
				bezierCurve : false,
				datasetFill : false,
				legendTemplate : '<ul>'
						+'<% for (var i=0; i<datasets.length; i++) { %>'
						+'<li>'
						+'<span style=\"background-color:<%=datasets[i].lineColor%>\"></span>'
						+'<% if (datasets[i].label) { %><%= datasets[i].label %><% } %>'
						+'</li>'
						+'<% } %>'
						+'</ul>'
			});
		});
  	})
})


$(function() {
  	$('.btn-group').on('click', function() {
  	  	$('.dropdown-menu').toggleClass('expand-btn-group')
  	})
})

$(function(e) {
  	e.preventDefault();
})