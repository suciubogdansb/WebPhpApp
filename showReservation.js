$((function () {
    function refresh() {
        $.getJSON("showReservationBackend.php", function (json) {
            $("table tr:gt(0)").remove()
            json.forEach(function (thing) {
                $("table").append(`<tr>
                                <td>${thing[2]}</td>
                                <td>${thing[3]}</td>
                                <td>${thing[4]}</td>
                                <td>
                                    <button onclick="window.location.href='deleteReservation.php?id=${thing[0]}'">Delete Reservation</button>
                                </td>
                               </tr>`)
            })
        })
    }
    refresh()
}));
