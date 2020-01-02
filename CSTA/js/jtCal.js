	function setMonth( ) {
		var select = document.getElementById( this.divName + "MonthSelect");
		this.selectedMonth = select.options[select.selectedIndex].value;
		this.parent.show();
	}

	function getMonth() {
		return this.selectedMonth;
	}

	function setYear( ) {
		var select = document.getElementById( this.divName + "YearSelect");
		this.selectedYear = select.options[select.selectedIndex].value;
		this.parent.show();
	}

	function getYear() {
		return this.selectedYear;
	}

function yearObj(divName, startYear, numYears, parent) {
	this.divName = divName;
	this.parent = parent;
	this.selectedYear = startYear;
	this.setYear = setYear;
	this.getYear = getYear;
	var endYear = startYear + numYears;

	var holdingDiv = document.getElementById(this.divName);
	var selectEle = document.createElement("select");
	var opt;
	selectEle.setAttribute("name", this.divName + "YearSelect");
	selectEle.setAttribute("id", this.divName + "YearSelect");
	for ( var i = startYear; i< endYear; i++ ) {
		opt = document.createElement("option");
		opt.setAttribute("value", i);
		opt.innerHTML = i;
		selectEle.appendChild(opt);
	}
	holdingDiv.appendChild(selectEle);
	selectEle.onchange = (function( obj ) { return function() { obj.setYear(); }; 
	})(this);
}

function monthObj(divName, parent) {
	this.divName = divName;
	this.parent = parent;
	this.selectedMonth = this.curMonth = parent.today.getMonth();
	var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

	this.setMonth = setMonth;
	this.getMonth = getMonth;

	var holdingDiv = document.getElementById(this.divName);
	var selectEle = document.createElement("select");
	var opt;
	selectEle.setAttribute("name", this.divName + "MonthSelect");
	selectEle.setAttribute("id", this.divName + "MonthSelect");

	for ( var i = 0; i <= 11; i++ ) {
		opt = document.createElement("option");
		opt.setAttribute("value", i);
		if ( this.curMonth == i ) {
			opt.setAttribute("selected", true);
		}
		opt.innerHTML = monthNames[i];
		selectEle.appendChild(opt);
	}

	holdingDiv.appendChild(selectEle);
	selectEle.onchange = (function( obj ) { return function() { obj.setMonth(); };
	})(this);
}

function buildList(divName, frontPadding, numDays , parent) {
	this.divName = divName;
	this.parent = parent;
	var ul = document.createElement("ul");
	ul.setAttribute("id", this.divName + "CalendarList");
	var li;

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "S";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "M";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "T";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "W";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "T";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "F";
	ul.appendChild(li);

	li = document.createElement("li");
	li.setAttribute("class", "dayName");
	li.innerHTML = "S";
	ul.appendChild(li);

	for ( var i = 0; i < frontPadding; i++ ) {
		li = document.createElement("li");
		li.innerHTML = "&nbsp;";
		ul.appendChild(li);
	}
	for ( i = 1; i <= numDays; i++ ) {
		li = document.createElement("li");
		li.setAttribute("id", "dayNo" + i);
		li.innerHTML = i;
		li.onclick = ( function( obj) { return function() { 
			if ( obj.parent.selectedDay > 0 ) {
				document.getElementById("dayNo" + obj.parent.selectedDay).removeAttribute("class");
			}
			obj.parent.selectedDay = this.innerHTML; 
			this.setAttribute("class", "selectedDay");
			obj.parent.dateChanged();
		}; })(this);
		if ( this.parent.month.getMonth() == this.parent.today.getMonth() && i == this.parent.today.getDate() ) {
			li.setAttribute("class", "today");
		}

		ul.appendChild(li);
	}
	var holdingDiv = document.getElementById(this.divName);
	holdingDiv.appendChild(ul);
}


function jtCal(divName, textInput, startYear, numYears) {
	this.today = new Date();
	this.selectedDay = 0;
	this.divName = divName;
	this.textInput = document.getElementById(textInput);
	this.month = new monthObj(this.divName, this);
	if ( typeof startYear == 'undefined' ) {
		startYear = this.today.getFullYear();
	}
	if ( typeof numYears == 'undefined' ) {
		numYears = 2;
	}
	this.year = new yearObj(this.divName, startYear, numYears, this);
	this.buildList = buildList;

	this.getDaysInMonth = function() {
		var month = this.month.getMonth();
		var year = this.year.getYear();
		var monthdays = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
		if (month != 1) {
			return monthdays[month];
		} else {
			return ((year % 4 == 0 && year % 100 != 0) || year % 400 == 0 ? 29 : 28);
		}
	}
	
	this.setTextInput = function( newTextInput ) {
		this.textInput = document.getElementById(newTextInput);
		if ( this.isForStatuses ) {
			var statusID = newTextInput.replace(/[^0-9]+/, "");
			document.getElementById("statusDateTitle").innerHTML = statusArray[statusID];
		}
		document.getElementById(this.divName + "MonthSelect").selectedIndex = this.today.getMonth();
		var tmpYear = document.getElementById(this.divName + "YearSelect");
		for ( var i = 0; i < tmpYear.options.length; i++ ) {
			if ( tmpYear.options[i].value == this.today.getFullYear() ) {
				tmpYear.selectedIndex = i;
				break;
			}
		}
		this.year.setYear();
		this.month.setMonth();
		this.show;

	}


	this.show = function() {
		var ul = document.getElementById(this.divName + "CalendarList");
		if ( ul != null ) {
			document.getElementById(this.divName).removeChild(ul);
		}
		var month = this.month.getMonth();
		var year = this.year.getYear();

		var firstDay = new Date(year, month, 1);

		this.buildList( this.divName, firstDay.getDay(), this.getDaysInMonth(), this);
	};

	this.dateChanged = function() {
		this.textInput.value = this.year.getYear() + "-" + ( Number( this.month.getMonth()) + 1) + "-" + this.selectedDay ;
	}

	this.show();
}

