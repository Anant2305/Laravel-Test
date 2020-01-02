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
	selectEle.onchange = (function( obj ) { return function() { obj.setYear(); }; obj.parent.show();
	})(this);
}

function monthObj(divName, parent) {
	this.divName = divName;
	this.parent = parent;
	this.selectedMonth = this.curMonth = parent.today.getMonth();
	var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

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
	selectEle.onchange = (function( obj ) { return function() { obj.setMonth(); obj.parent.show(); };
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
		li.innerHTML = i;
		li.onclick = ( function( obj) { return function() { 
			obj.parent.selectedDay = this.innerHTML; 
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


function jtCal(divName, textInput, startYear, numYears, isForStatuses ) {
	this.today = new Date();
	this.ajaxObjects = new Array();
	this.ajaxIndex = this.ajaxObjects.length;
	this.selectedDay = 0;
	this.divName = divName;
	this.isForStatuses = isForStatuses;
	if ( textInput != "" ) {
		this.textInput = document.getElementById(textInput);
	}
	this.month = new monthObj(this.divName, this);
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
	if ( this.isForStatuses == false ) {
		this.textInput.value = this.year.getYear() + "-" + ( Number( this.month.getMonth()) + 1) + "-" + this.selectedDay ;
		document.getElementById(statusCal.divName + "_container").style.display = "none";
	} else {
		this.ajaxObjects[this.ajaxIndex] = new sack();
		this.ajaxObjects[this.ajaxIndex].setVar("saleID", document.getElementById("sale_id").value);
		this.ajaxObjects[this.ajaxIndex].setVar("statusID", this.textInput.id.replace(/[^0-9]+/, ""));
		this.ajaxObjects[this.ajaxIndex].setVar("agentID", document.getElementById("backofficeUser").value);
		this.ajaxObjects[this.ajaxIndex].setVar("newDate", this.year.getYear() + "-" + (Number( this.month.getMonth()) + 1) + "-" + this.selectedDay);
		this.ajaxObjects[this.ajaxIndex].requestFile = "ajax-change-status-date.php";
		this.ajaxObjects[this.ajaxIndex].onCompletion = function() {
			statusCal.textInput.value = statusCal.selectedDay + "/" + (Number( statusCal.month.getMonth()) + 1) + "/" + statusCal.year.getYear();
			document.getElementById(statusCal.divName + "_container").style.display = "none";
			var statusSelect = document.getElementById("newStatus");
			var statusNo = parseInt(statusCal.textInput.id.replace(/[^0-9]+/, ""));
			if ( statusNo == 485 || statusNo == 428 || statusNo == 96 || statusNo == 97 || statusNo == 98 || statusNo == 99 || statusNo == 100 || statusNo == 101 || statusNo == 102 || statusNo == 103 || statusNo == 104 || statusNo == 315 || statusNo == 339 || statusNo == 340 || statusNo == 422 || statusNo == 423 || statusNo == 424 || statusNo == 425 ) {

				return;
			}
			
			if(statusNo == 111){
				document.getElementById('status111').value = 1;	
				
			}
			
			if(statusNo == 152){
				document.getElementById('status152').value = 1;	
				
			}
			
			for ( var i = 0; i < statusSelect.options.length; i++ ) {
				if ( statusSelect.options[i].value == statusNo ) {
					statusSelect.selectedIndex = i;
					break;
				}
			}
		};
		this.ajaxObjects[this.ajaxIndex].runAJAX();
	}
	}

	this.show();
}

