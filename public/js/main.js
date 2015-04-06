/****************************************
  General Usage
*****************************************/

String.prototype.toProperCase = function () {
    return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

var chartData = [];

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
  Handlebars Render
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
  AJAX Calls
*****************************************/

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


$(function() {

  	//Player Edit: Player chooses the date they want to edit
  	//Input boxes are displayed
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

  	//Player Edit: Player clicks edit
  	//Date dropdown is generated
  	$('body').on('click', '#edit-entry', function() {
  	  	$(this).parent().find('#add-entry').remove();
  	  	$(this).remove();
  	  	$('.input-form-values.initial-hide').removeClass();
  	  	var user_id = $('body').find('#get-dates-id').val();

  	  	$.get("/api/addPlayerInfo/" + user_id , function(data) {
  	  		renderDateDropdown(data);
		})
  	})
  	
  	//Generates input fields for player to add
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


})

/****************************************
  jQuery
*****************************************/


$(function() {

	//Select Category
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

	//Navigation button
	$('section').on('click', '.user-nav-button', function() {
	  	$(this).parent().find('.user-nav-list').toggleClass('initial-hide');
	})

	//Display category at top of graph
	$('.all-categories').on('click', 'input', function() {
	  	var value = $(this).parent().text()
	  	console.log(value)
	  	$('section').find('.current-category').remove()
	  	var new_category = '<div class="current-category">' + value + '</div>'
	  	$('section').prepend(new_category);
	})

	function legendPopUp (base_value, scale) {
		return('<div>' + base_value + ' = 0</div><div>Scale: ' + scale + '</div>')
	}

	function removeAndEmpty (pop_up) {
		pop_up.removeClass('pop-up-hide');
		pop_up.empty();
	}

	//Coach Profile: Coach selects player
  	$('.content').on('click', 'button', function(e) {
  	  	e.preventDefault();
  	  	$(this).parents('body').find('section > h1').remove();
  	  	var value = $( "#coach-choose-player option:selected" ).val();
  	  	var hidden_id = $(this).parents('.user-nav').find('#hidden-id')
  	  	hidden_id.remove();
  	  	var hidden_id_parent = $(this).parents('.user-nav').find('.all-categories .container-title')
  		$(hidden_id_parent).append("<input id=\"hidden-id\"type=\"hidden\" value=" + value + ">");
  	  	var url = "/api/chartData/" + value;
  	  	getChartData(url);
  	  	$('body').find('.current-category').remove()
  	  	var new_category = '<div class="current-category">Overall</div>'
	  	$('section').prepend(new_category);
	  	$('body').find('.all-categories .overall input').prop('checked',true);
  	})


	/****************************************
	  Legend Rendering on player add/edit
	*****************************************/
	
	$('section').on('click', '.sleep_length_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('8 hours','-4 to 4'));
	})

	$('section').on('click', '.sleep_quality_input', function() {
		var pop_up = $('section').find('.input-pop-up')
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Normal','-2 to 2'))
	})

	$('section').on('click', '.tiredness_sensation_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Normal','-1 to 1'));
	})

	$('section').on('click', '.training_willingness_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Normal','-2 to 2'));
	})

	$('section').on('click', '.appetite_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Normal','-2 to 2'));
	})

	$('section').on('click', '.soreness_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Slight','-3 to 1'));
	})

	$('section').on('click', '.nutrition_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend(legendPopUp('Ate Breakfast','-1 to 1'));
	})

	$('section').on('click', '.created_at_input', function() {
		var pop_up = $('section').find('.input-pop-up');
		removeAndEmpty(pop_up);
		pop_up.prepend('<div>Please input y-m-d:</div><div>Exp: 2000-01-31</div>');
	})

})

