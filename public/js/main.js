/****************************************
  General Usage
*****************************************/

String.prototype.toProperCase = function () {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

/****************************************
  Handlebars
*****************************************/


var renderDate = function(data) {
	var source = $('#template-date').html();
	var template = Handlebars.compile(source);
	var output = template({
		date: data
	});
	
	return output;
}

var renderValues = function(data) {
	var source = $('#template-input-values').html();
	var template = Handlebars.compile(source);
	var output = template(data);
	
	return output;
}

var renderBlankValues = function(data) {
	var source = $('#template-blank-input').html();
	var template = Handlebars.compile(source);
	var output = template(data);
	
	return output;
}

/****************************************
  Call Handlebars
*****************************************/


var renderDateDropdown = function(data) {
	$('body').find('section').append(renderDate(data));
}
var renderInputValues = function(data) {
	var appendHere = $('body').find('.input-form');
	appendHere.removeClass('initial-hide');
	appendHere.append(renderValues(data));
}
var renderBlankInputValues = function(data) {
	var appendHere = $('body').find('.input-form-blanks');
	appendHere.removeClass('initial-hide');
	appendHere.append(renderBlankValues(data));
}

/****************************************
  Chart Render
*****************************************/

var chartData = [];

function getChartData (url) {
	$.get( url , function( data ) {
		var lineChartData = {
			labels : data[0],
			datasets : [
				{
					strokeColor : '#2D4255',
					data : data[1],
					pointColor: "#ADBCC3"
				},
			]
		};
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: true,
			animation: false,
			bezierCurve : false,
			datasetFill : false
		});
	});
};

/****************************************
  AJAX Calls
*****************************************/


$(function() {

	$('section').on('click', '.user-nav-button', function() {
	  	$(this).parent().find('.user-nav-list').toggleClass('initial-hide');
	})

	$('.all-categories').on('click', 'input', function() {
	  	var value = $(this).parent().text()
	  	console.log(value)
	  	$('section').find('.current-category').remove()
	  	var new_category = '<div class="current-category">' + value + '</div>'
	  	$('section').prepend(new_category);
	})

  	$('input').on('click', function() {
  		$(this).parents('body').find('section > h1').remove();
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

  	$('.content').on('click', 'button', function(e) {
  	  	e.preventDefault();
  	  	$(this).parents('body').find('section > h1').remove();
  	  	var value = $( "#coach-choose-player option:selected" ).val();
  	  	var hidden_id = $(this).parents('.user-nav').find('#hidden-id')
  	  	hidden_id.remove();
  	  	var hidden_id_parent = $(this).parents('.user-nav').find('.all-categories .container-title')
  		$(hidden_id_parent).append("<input id=\"hidden-id\"type=\"hidden\" value=" + value + ">");
  	  	console.log('here');
  	  	var url = "/api/chartData/" + value;
  	  	getChartData(url);
  	  	$('body').find('.current-category').remove()
  	  	var new_category = '<div class="current-category">Overall</div>'
	  	$('section').prepend(new_category);
  	})

  	$('body').on('click', '#edit-entry', function() {
  	  	console.log('edit');
  	  	$(this).parent().find('#add-entry').remove();
  	  	$(this).remove();
  	  	$('.input-form-values.initial-hide').removeClass();
  	  	var user_id = $('body').find('#get-dates-id').val();

  	  	$.get("/api/addPlayerInfo/" + user_id , function(data) {
  	  		renderDateDropdown(data);
		})
  	})

  	$('body').on('click', '#add-entry', function() {
  	  	console.log('add');
  	  	$(this).parent().find('#edit-entry').remove();
  	  	$(this).remove();
  	  	$('.input-form.initial-hide').removeClass()
  	  	var user_id = $('body').find('#get-dates-id').val();

  	  	$.get("/api/blankInput/" + user_id , function(data) {
  	  		var d = data[0];
  	  		var keys = Object.keys(d);
  	  		for (var i = 0; i < keys.length; i++) {
  	  			var key = keys[i];
			    var newKey = keys[i].split('_');
			    var newKeyString = newKey.join(' ');
			    newKeyString = newKeyString.toProperCase();
			    renderBlankInputValues({pname: newKeyString, uname:key});
			}
			$('body').find('.input-form-blanks').append('<button>Submit</button>');
  	  	})
  	})

  	$('body').on('click', '#submit-date', function(e) {
  		e.preventDefault();
  	  	var value = $( "#date-dropdown option:selected" ).val();
  	  	var user_id = $('body').find('#get-dates-id').val();
  	  	$('body').find('.temp-dropdown-menu').remove()
  	  	$.get("/api/addPlayerInfo/" + user_id + "/" + value, function(data) {
  	  		var d = data[0];
  	  		var values = $.map(d, function(el) { return el; });
  	  		var keys = Object.keys(d);
  	  		for (var i = 0; i < keys.length; i++) {
  	  			var key = keys[i];
			    var newKey = keys[i].split('_');
			    var newKeyString = newKey.join(' ');
			    newKeyString = newKeyString.toProperCase();
			    renderInputValues({pname: newKeyString, value:d[key], uname:key});
			}
			$('body').find('.input-form').append('<button>Submit</button>');
  	  	})
  	})

})

/****************************************
  jQuery
*****************************************/


$(function() {
  	$('.btn-group').on('click', function() {
  	  	$('.dropdown-menu').toggleClass('expand-btn-group')
  	})
})

