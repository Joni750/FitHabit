/* --- SCRIPT PARA EL MENU ------------------------------------ */
const toTop = (() => {
    let button = document.getElementById("toTop");
    window.onscroll = () => {
      button.classList[
          (document.documentElement.scrollTop > 50) ? "add" : "remove"]("is-visible")
    }
    button.onclick = () => {
      window.scrollTo({
        top:0, behavior:"smooth"
      })
    }
  })();
document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.querySelector('.menu-btn');
    const menu = document.querySelector('.menu');
    const closeBtn = document.querySelector('.close-btn');


    function toggleMenu() {
        menuBtn.classList.toggle('open');
        menu.classList.toggle('open');
    }

    menuBtn.addEventListener('click', toggleMenu);
    closeBtn.addEventListener('click', toggleMenu);


    /* SCRIPT PARA EL ANCHO DE PANTALLA */
    var screenWidth = window.screen.width;
    if ((screenWidth > 610)) {

    }


});

/* ------------------------------------------------------------------------*/
let toggleSublist = () => {
    const sublist = document.querySelector('.sublist');

    if (sublist.style.display == "none") {
        sublist.style.display = "block";
    } else {
        sublist.style.display = "none";
    }
}

/*Carrito */
let cerrarCarrito = () => {
    let equis = $('#equis');
    let footer = $('footer');

    equis.click(function () {
        // console.log("equis click")
        footer.animate({
            top: '100%'
        });

    });

}

/*Carrito */
let verCarrito = () => {
    let ver = $('#ver');
    let footer = $('footer');

    ver.click(function () {
        // console.log("ver click")
        footer.css("top", "auto");

    });

}
/* HABITOS ===================*/

let cerrarHabito = () => {
    let equis = $('#equis');
    let footer = $('#habitList');
    // console.log("funciona¿?¿?¿?")
    equis.click(function () {
        console.log("Equis clicked")
        footer.css({
            "bottom": 'auto'
        });

    });
}
let verHabitos = () => {
    // console.log("si funciona el onclick en la a") // -> si funciona, surprised
    let plus = $('#plus');
    let footer = $('#habitList');
    console.log("hola=?");
    plus.click(function () {
        console.log("habitos click")
        footer.css("bottom", "0");
    })
}


/* HABITOS ===================*/

/* JAVASCRIPT DEL CALENDARIO */



today = new Date();
currentMonth = today.getMonth();
currentYear = today.getFullYear();
selectYear = document.getElementById("year");
selectMonth = document.getElementById("month");
let currentDate = new Date(year, month);
months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

monthAndYear = document.getElementById("monthAndYear");
showCalendar(currentMonth, currentYear);

function next() {
    // Obtener el mes y año seleccionados en el calendario
    let selectedMonth = parseInt(selectMonth.value);
    let selectedYear = parseInt(selectYear.value);

    // Actualizar el mes y año seleccionados al siguiente mes
    selectedYear = (selectedMonth === 11) ? selectedYear + 1 : selectedYear;
    selectedMonth = (selectedMonth + 1) % 12;

    // Mostrar el calendario del siguiente mes
    showCalendar(selectedMonth, selectedYear);
}
function previous() {
    // Obtener el mes y año seleccionados en el calendario
    let selectedMonth = parseInt(selectMonth.value);
    let selectedYear = parseInt(selectYear.value);

    // Obtener el mes y año actual
    let today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    // Si el mes seleccionado es igual al mes actual, no permitir retroceder más
    if (selectedYear === currentYear && selectedMonth === currentMonth) {
        return; // Salir de la función sin hacer nada
    }

    // Calcular el mes anterior
    selectedYear = (selectedMonth === 0) ? selectedYear - 1 : selectedYear;
    selectedMonth = (selectedMonth === 0) ? 11 : selectedMonth - 1;

    // Mostrar el calendario del mes anterior
    showCalendar(selectedMonth, selectedYear);
}

function previous() {
    let today = new Date;
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();

    // Obtener el mes y año seleccionados en el calendario
    let selectedMonth = parseInt(selectMonth.value);
    let selectedYear = parseInt(selectYear.value);

    // Permitir el retroceso solo si no estás en el mes actual
    if (!(selectedYear === currentYear && selectedMonth === currentMonth)) {
        // Calcular el mes anterior
        let previousYear = (selectedMonth === 0) ? selectedYear - 1 : selectedYear;
        let previousMonth = (selectedMonth === 0) ? 11 : selectedMonth - 1;

        // Mostrar el calendario del mes anterior
        showCalendar(previousMonth, previousYear);
    }
}

function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    showCalendar(currentMonth, currentYear);
}


function showCalendar(month, year) {
    let today = new Date(); // Obtener la fecha actual
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date=1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");

        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDay) {
                // Empty cells for days before the current month
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                break;
            } else {

                // Creating radio input only for the current and future dates
                if (new Date(year, month, date+1) >= today) {
                    let rb = document.createElement("input");
                    rb.type = "radio";
                    rb.name = "calendar-value";
                    let mes = month + 1;
                    rb.value = date + "-" + mes + "-" + year;
                    rb.onclick = highlightSelectedDay;
                    cell = document.createElement("td");
                    cellText = document.createTextNode(date);
                    cell.appendChild(rb);

                    if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                        cell.classList.add("todayy");
                    } // color today's date

                    cell.appendChild(cellText);
                    row.appendChild(cell);
                } else {
                    // Empty cells for past dates
                    cell = document.createElement("td");
                    cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                }
                date++;
            }
        }
        tbl.appendChild(row); // appending each row into calendar body.
    }
   /* if (currentYear === year && currentMonth === month) {
        document.getElementById("previous").disabled = true;
    } else {
        document.getElementById("previous").disabled = false;
    }*/
}


function highlightSelectedDay(event) {
    let selectedDay = event.target;
    let selectedCell = selectedDay.parentNode;
    // Remove background color from previously selected cells
    let cells = document.querySelectorAll(".selected-day");
    cells.forEach(function (cell) {
        cell.classList.remove("selected-day");
    });
    // Set background color to the selected cell
    selectedCell.classList.add("selected-day");
}

// check how many days in a month code from https://dzone.com/articles/determining-number-days-month
function daysInMonth(iMonth, iYear) {
    return 32 - new Date(iYear, iMonth, 32).getDate();
}

/*
function showCalendar(month, year) {

    let firstDay = (new Date(year, month)).getDay();

    tbl = document.getElementById("calendar-body"); // body of the calendar

    // clearing all previous cells
    tbl.innerHTML = "";

    // filing data about month and in the page via DOM.
    monthAndYear.innerHTML = months[month] + " " + year;
    selectYear.value = year;
    selectMonth.value = month;

    // creating all cells
    let date = 1;
    for (let i = 0; i < 6; i++) {
        // creates a table row
        let row = document.createElement("tr");



        //creating individual cells, filing them up with data.
        for (let j = 0; j < 7; j++) {
            if (i === 0 &&
                 j < firstDay) {
                cell = document.createElement("td");
                cellText = document.createTextNode("");
                cell.appendChild(cellText);
                row.appendChild(cell);

            }
            else if (date > daysInMonth(month, year)) {
                break;
            } else {
                if (new Date(year, month, date) >= today) {
                let rb = document.createElement("input");
                rb.type = "radio";
                rb.name = "calendar-value"
                let mes = month+1
                rb.value = date+"-"+mes+"-"+year;
                rb.onclick = highlightSelectedDay;
                cell = document.createElement("td");
                cellText = document.createTextNode(date);
                cell.appendChild(rb)
                /*let cellText = document.createElement("label");
                cellText.textContent = day.getDate(); // Establecer el contenido del label como el número del día
                cellText.classList.add("fondoCalendar");
                cell.appendChild(cellText);
                if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                    cell.classList.add("today");} // color today's date
                cell.appendChild(cellText);
                row.appendChild(cell);
                }else{
                    cell = document.createElement("td");
                    cellText = document.createTextNode("");
                    cell.appendChild(cellText);
                    row.appendChild(cell);
                }
                date++;
            }
            }


        }

        tbl.appendChild(row); // appending each row into calendar body.
    }

}
*/

