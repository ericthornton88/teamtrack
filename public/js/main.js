
var chartData = [];

function getChartData (url) {
	$.get( url , function( data ) {
		var lineChartData = {
			labels : data[0],
			datasets : [
				{
					strokeColor : 'black',
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
}

$(function() {
  	$('input').on('click', function() {
  		$(this).parents('body').find('section h1').remove();
  		var container = $(this).parents('.all-categories').find('.container-title');
  		var find_hidden = container.find('#hidden-id');

  		var metric = $(this).val();

  		if (metric == 'overall') {
  			var url = "/api/chartData/" + find_hidden.val()
  		} else {
  			var url = "/api/chartData/" + find_hidden.val() + "/" + metric
  		}
  		getChartData(url);
  	})
})


$(function() {
  	$('.btn-group').on('click', function() {
  	  	$('.dropdown-menu').toggleClass('expand-btn-group')
  	})

  	$('.content').on('click', 'button', function(e) {
  	  	e.preventDefault();
  	  	$(this).parents('body').find('section h1').remove();
  	  	var value = $( "#coach-choose-player option:selected" ).val();
  	  	var hidden_id = $(this).parents('.user-nav').find('#hidden-id')
  	  	hidden_id.remove();
  	  	var hidden_id_parent = $(this).parents('.user-nav').find('.all-categories .container-title')
  		$(hidden_id_parent).append("<input id=\"hidden-id\"type=\"hidden\" value=" + value + ">");
  	  	console.log('here');
  	  	var url = "/api/chartData/" + value;
  	  	getChartData(url);

  	})

  	$('body').on('click', '#edit-entry', function() {
  	  	console.log('edit');
  	  	$('section h2').remove()
  	  	$('.input-form.initial-hide').removeClass()
  	})

  	$('body').on('click', '#add-entry', function() {
  	  	console.log('add');
  	  	$('section h2').remove()
  	  	$('.input-form-values.initial-hide').removeClass()
  	})
})

