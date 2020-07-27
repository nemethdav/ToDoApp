var reminder = document.getElementById('reminder');

reminder.onclick = function () {
    var reminder = document.getElementById('reminder');
    var dateDiv = document.getElementById('dateDiv');

    if (reminder.checked) {
        dateDiv.style.display = 'block';

        //Minimum-maximum dátum meghatározása az emlékeztetőhöz
        reminder_date.min = new Date().toISOString().split("T")[0];

        var deadline = new Date(Date.parse(document.getElementById("deadline").value));
        var twoDigitMonth = (deadline.getMonth() + 1).toString();
        if (twoDigitMonth.length == 1)
            twoDigitMonth = "0" + twoDigitMonth;
        var twoDigitDate = deadline.getDate().toString();
        if (twoDigitDate.length == 1)
            twoDigitDate = "0" + twoDigitDate;
        var deadlineDate = deadline.getFullYear() + "-" + twoDigitMonth + "-" + twoDigitDate;

        reminder_date.max = deadlineDate;

    } else {
        dateDiv.style.display = 'none';
    }
}
