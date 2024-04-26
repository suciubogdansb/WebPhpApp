$((function () {
    function refresh() {
        let type = $("#type")
        let price = $("#price")
        $.getJSON("showRoomsBackend.php", {type: type.val(), price: price.val()}, function (json) {
            $("table tr:gt(0)").remove()
            json.forEach(function (thing) {
                $("table").append(`<tr>
                                <td>${thing[0]}</td>
                                <td>${thing[1]}</td>
                                <td>${thing[2]}</td>
                                <td>
                                    <button onclick="window.location.href='addReservation.php?id=${thing[0]}'">Make Reservation</button>
                                </td>
                               </tr>`)
            })
        })
    }

    $("#type, #price").on("input", function () {
        refresh()
    })

    refresh()
}));
