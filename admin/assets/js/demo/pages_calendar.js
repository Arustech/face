"use strict";
$(document).ready(function () {
    var b = new Date();
    var e = b.getDate();
    var a = b.getMonth();
    var f = b.getFullYear();
    var c = {};
    if ($("#calendar").width() <= 400) {
        c = {
            left: "title",
            center: "",
            right: "prev,next"
        }
    } else {
        c = {
            left: "prev,next",
            center: "title",
            right: "month,agendaWeek,agendaDay"
        }
    }
    $("#calendar").fullCalendar({
        disableDragging: false,
        header: c,
        editable: true,
        events: [{
            title: "All Day Event",
            start: new Date(f, a, 1),
            backgroundColor: App.getLayoutColorCode("yellow")
        }, {
            title: "Long Event",
            start: new Date(f, a, e - 5),
            end: new Date(f, a, e - 2),
            backgroundColor: App.getLayoutColorCode("green")
        }, {
            title: "Repeating Event",
            start: new Date(f, a, e - 3, 16, 0),
            allDay: false,
            backgroundColor: App.getLayoutColorCode("red")
        }, {
            title: "Repeating Event",
            start: new Date(f, a, e + 4, 16, 0),
            allDay: false,
            backgroundColor: App.getLayoutColorCode("green")
        }, {
            title: "Meeting",
            start: new Date(f, a, e, 10, 30),
            allDay: false,
        }, {
            title: "Lunch",
            start: new Date(f, a, e, 12, 0),
            end: new Date(f, a, e, 14, 0),
            backgroundColor: App.getLayoutColorCode("grey"),
            allDay: false,
        }, {
            title: "Birthday Party",
            start: new Date(f, a, e + 1, 19, 0),
            end: new Date(f, a, e + 1, 22, 30),
            backgroundColor: App.getLayoutColorCode("purple"),
            allDay: false,
        }, {
            title: "Click for Google",
            start: new Date(f, a, 28),
            end: new Date(f, a, 29),
            backgroundColor: App.getLayoutColorCode("yellow"),
            url: "http://google.com/",
        }]
    })
});