$(window).on("load", function () {
    if (!window.jQuery) {
        alert("i stopped Working");
    }

    $("#companyIdSelector").on("submit", function (e) {
        e.preventDefault();
        fetchShippingProducts($("input").first().val());
    });

    var username = "frits@test.qlsnet.nl";
    var password = "4QJW9yh94PbTcpJGdKz6egwH";

    function make_base_auth(user, password) {
        var tok = user + ":" + password;
        var hash = btoa(tok);
        return "Basic " + hash;
    }

    function fetchShippingProducts(companyId) {
        console.log(companyId);
        let authValue = make_base_auth(username, password);
        $.ajax({
            url: API_URL + "/company",
            type: "GET",
            crossDomain: true,
            headers: {
                accept: "application/json",
                Authorization: authValue,
                "Access-Control-Allow-Origin": "*",
            },
            success: function (result) {
                console.log("iwork");
            },
            error: function (error) {
                console.log("iwork");
            },
        });
    }
});
