//	dp_dateFormat = 'dd-mm-yyyy';
// Use JSON format (http://www.json.org/js.html), notice the last item
// does not have a comma and the months start with zero.
aCompanyHolidays = [
	{"date": new Date(2006,0,2), "desc":"New Year's Day"},
	{"date": new Date(2006,0,16), "desc":"Martin Luther King Day"},
	{"date": new Date(2006,1,20), "desc":"Presidents' Day"},
	{"date": new Date(2006,4,29), "desc":"Memorial Day"},
	{"date": new Date(2006,6,4), "desc":"Independence Day"},
	{"date": new Date(2006,8,4), "desc":"Labor Day"},
	{"date": new Date(2006,10,23), "desc":"Thanksgiving Day"},
	{"date": new Date(2006,11,25), "desc":"Christmas Day"},
	{"date": new Date(2007,0,1), "desc":"New Year's Day"},
	{"date": new Date(2007,0,15), "desc":"Martin Luther King Day"},
	{"date": new Date(2007,1,19), "desc":"Presidents' Day"},
	{"date": new Date(2007,4,28), "desc":"Memorial Day"},
	{"date": new Date(2007,6,4), "desc":"Independence Day"},
	{"date": new Date(2007,8,3), "desc":"Labor Day"},
	{"date": new Date(2007,10,22), "desc":"Thanksgiving Day"},
	{"date": new Date(2007,11,25), "desc":"Christmas Day"}
];
// Set Holidays and allow the user to click a holiday.
g_Calendar.setHolidays(aCompanyHolidays, true);

// Day of week mask. 1 allows the day to be clicked, 0 does not.
aDays = [1,1,1,1,1,1,1];

function toggleHolidaysClickable(el) {
	if(el.checked)
		g_Calendar.showHolidays = true;
	else
		g_Calendar.showHolidays = false;
}

// insert a new element after the target element.
function insertAfter(newElement,targetElement) {
	var parent = targetElement.parentNode;
	if (parent.lastChild == targetElement) {
		parent.appendChild(newElement);
	} else {
		parent.insertBefore(newElement,targetElement.nextSibling);
	}
}

function showHolidays(btn) {
	// Get the div that contains the table of holidays.
	var el = document.getElementById("holidays");
	if(!el) {
		// The container div doesn't exist, create it.
		el = document.createElement('div');
		el.id = 'holidays';
		// Insert the div after the paragraph that contains the button
		// that called this function.
		insertAfter(el, btn.parentNode);
	}

	// If the div is already displayed, hide it and return.
	if(arguments.callee.show) {
		arguments.callee.show = false;
		el.className = "hide";
		btn.value="Show Holidays";
		return;
	}

	if(!arguments.callee.build) {
		// Build the table of holidays.
		var str = "<table><thead><tr><th>Holiday</th><th>Date</th></tr></thead><tbody>";
		for(var h = 0; h < aCompanyHolidays.length; h++) {
			str += "<tr><td>" + aCompanyHolidays[h].desc + "</td><td>" + aCompanyHolidays[h].date.toLocaleDateString() + "</td></tr>";
		}

		str += "</tbody></table>";
		// Add the table to the div.
		el.innerHTML = str;
		// Set a flag so that we dont build that table again.
		arguments.callee.build = true;
	}

	// Set a flag that tells us that the holidays are displayed.
	arguments.callee.show = true;
	// Set a class that will display the div.
	el.className = "show";
	// Change the text of the button.
	btn.value="Hide Holidays";
}

function toggleDay(el) {
	var i = parseInt(el.value);
	if(el.checked)
		aDays[i] = 1;
	else
		aDays[i] = 0;
	g_Calendar.setDayMask(aDays);
}

// Add a click event to the show holiday and show day of week fields.
addEvent(window,"DOMContentLoaded",function() {
	var el = document.getElementById("HolidaysClickable");
	addEvent(el, "click", function(){toggleHolidaysClickable(this);});

	var els = document.getElementsByName("DayOfWeek");
	if(!els.length)
		return;

	for(var i=0; i<els.length; i++){
		var el = els[i];
		addEvent(el,"click", function(){toggleDay(this);});
	}
});