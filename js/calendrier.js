var currentDate = new Date();
//pour noter la date currente du calendrier,quand on choisit une date, il sais mis a jour

var today = new Date();
var thisMonth = today.getMonth();
var thisYear = today.getFullYear();
//newCalendar(thisYear, thisMonth);
//pour noter la date d'aujourd'hui

var datedDate;
//quand la date est changé, c'est pour noter la date de la dernière opération

newCalendar();
//initialiser le calendrier

 //pour surveiller l'action du bouton "lastYear"
var btnLastYear = document.getElementById("lastYear");
btnLastYear.addEventListener("click", function() {
    var currentYear = currentDate.getFullYear();
    currentDate.setYear( --currentYear );
    newCalendar();
}, false);

 //pour surveiller l'action du bouton "nextYear"
var btnNextYear = document.getElementById("nextYear");
btnNextYear.addEventListener("click", function() {
    var currentYear = currentDate.getFullYear();
    currentDate.setYear( ++currentYear );
    newCalendar();
}, false);

 //pour surveiller l'action du bouton "lastMonth"
var btnLastMonth = document.getElementById("lastMonth");
btnLastMonth.addEventListener("click", function() {
    var currentMonth = currentDate.getMonth();
    currentDate.setMonth( --currentMonth );
    newCalendar();
}, false);

 //pour surveiller l'action du bouton "nextMonth"
var btnNextMonth = document.getElementById("nextMonth");
btnNextMonth.addEventListener("click", function() {
    var currentMonth = currentDate.getMonth();
    currentDate.setMonth( ++currentMonth);
    newCalendar();
}, false);

 //pour surveiller l'action du bouton "aujourd'hui"
var btnBackToday = document.getElementById("backToday");
btnBackToday.addEventListener("click", function() {
    var nowTime = today.getTime();
    currentDate.setTime(nowTime);
    newCalendar();
}, false);

var dateNav = document.getElementsByClassName("date");
//quand tableau de date initialisé, il y a une classe date pour tout les champs de tableau,

function newCalendar() {
    var month = currentDate.getMonth();//recuperer le mois d'argument date 
    var year = currentDate.getFullYear();//recuperer l'annee d'argument date 
    var date = currentDate.getDate();//recuperer la date d'argument date 
    var thisMonthDay = new Date(year, month, 1);
    var thisMonthFirstDay = thisMonthDay.getDay();
    var thisMonthFirstDate = new Date(year, month, - thisMonthFirstDay);
    generateTable(thisMonthFirstDate);  //initialiser zone de date
    generateNav(year, month);  //initialiser zone de span
    generateToday(); //initialiser zone d'info today
    currentDate.setYear(year);
    currentDate.setMonth(month);
    return currentDate;
}
//il y a un probleme, je veux pas afficher les chiffres avant la premier jour et apres la dernier jour
 
 //recuperer year et month par ID et toString sur zone span
 //ajouter le temps qu'on a changé
function generateNav(year, month) {
    var navYear = document.getElementById("year");
    var navMonth = document.getElementById("month");
    navYear.innerText = year.toString();
    navMonth.innerText = (month + 1).toString();
}


 //par la position de la premier jour, initialiser le tableau du calendrier
 //utiliser la classe Date pour resoudre le probleme de mois quand on change le mois.
 //initialiser tableau 6*7, et ajouter tree dom, afficher la zone de date
 // {date}firstDate c'est la chiffre de premier ligne,premier cologne, commence à 0
function generateTable(firstDate) {
    var dateTable = document.getElementById("dateTable");
	//recuperer tableau de date, si c'est pas la preniere fois d'initialisation de ce tableau, il faut supprimer le tableau qu'on a affiché avant
    while (dateTable.firstChild) {
        dateTable.removeChild(dateTable.firstChild);
    }
    var date = firstDate.getDate();//je sais pas pk FirstDate est 27/mai
	var mois = firstDate.getMonth();//afficher 4 pour dire c'est mai
	var annee=firstDate.getFullYear();//afficher 2017
	var semaine= firstDate.getDay();//afficher 6 pour dire c'est samedi
 	for (var i = 0; i < 6; i++){
        var newRow = document.createElement("tr");
		for(var j = 0; j < 7; j++){
            var newDate = document.createElement("td");
            //recuperer l'info de la date
            firstDate.setDate(++date);
            date = firstDate.getDate();
			var month = firstDate.getMonth();//afficher 5 pour juin, la fin 6 est pour juillet 
			var monthConpare= new Date();
			monthConpare.setMonth(firstDate.getMonth()+1);
			var nextMonth = monthConpare.getMonth();//afficher 6 apres 7
			if(month>mois&&(nextMonth-mois)<3){
				newDate.innerText = date;
				//mettre id de node pour les utiliser apres
				var dateInfo = firstDate.toLocaleDateString();
				newDate.setAttribute("id",dateInfo);
				newDate.setAttribute("class", "date");
				//mettre onclick
				newDate.setAttribute("onclick", "generateToday(\"" + dateInfo+ "\")");
				newRow.appendChild(newDate);
				
			}else{
				newDate.innerText="";
				newDate.setAttribute("id",dateInfo);
				newDate.setAttribute("class", "date");
				//mettre onclick
				newDate.setAttribute("onclick", "generateToday(\"" + dateInfo+ "\")");
				newRow.appendChild(newDate);
			}
			if((nextMonth-mois)==3){
				newDate.innerText="";
			}
			//var nextMonth = monthConpare.setMonth(firstDate.getMonth()+1);
            /*if(month>nextMonth){
				newDate.innerText="";
				newDate.setAttribute("id",dateInfo);
				newDate.setAttribute("class", "date");
				//mettre onclick
				newDate.setAttribute("onclick", "generateToday(\"" + dateInfo+ "\")");
				newRow.appendChild(newDate);
			}*/
		}
        dateTable.appendChild(newRow);
    }
}


 
 //pour afficher les infos de today, pour dateInfo
 // essayer de afficher les events d'ici
function generateToday(dateString) {
    if(dateString){ //si il transmet l'argument, il mettre les valeurs selon l'argument
        var info = dateString.split("/");
        currentDate.setYear(info[2]); //il faut bien trouver l'ordre de la date
        if( currentDate.getDate() > 30) {
            currentDate.setDate(info[0]);
            currentDate.setMonth(parseInt(info[1])-1 );
        }else {
            currentDate.setMonth(parseInt(info[1])-1 );
            currentDate.setDate(info[0]);
        }
    }
    if( datedDate == null){
        //primiere fois d'initialisation
        datedDate = new Date();
    }else{
        //recupere les valeurs que la derniere operation, et supprimer la format
        var datedDateString = datedDate.toLocaleDateString();
        document.getElementById(datedDateString).setAttribute("class","date");
    }
    var dateInfo = currentDate.toLocaleDateString(); //obtenir la date en format aaaa/mm/jj
    //var dayNum = currentDate.getDate();
    var weekInfo = currentDate.getDay();
    var weekArray = ["Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
    document.getElementById("dateInfo").innerText = dateInfo; //DOM操作日期
    //document.getElementById("dateNum").innerText = dayNum.toString();
    document.getElementById("weekInfo").innerText = weekArray[weekInfo];
    var dateTd = document.getElementById(dateInfo);
    dateTd.setAttribute("class","todayTd"); //mettre nouveau css
    // noter la date de cette opération
    datedDate.setYear(currentDate.getFullYear()); //il faut pas tromper l'ordre, sinon il y aura un probleme
    datedDate.setMonth(currentDate.getMonth());
    datedDate.setDate(currentDate.getDate());
}

//ça manque une fonction, quand on selectionne une date dans le tableau, besoin d'utiliser node id