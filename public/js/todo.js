var ToDo = function () {

    // private functions & variables
    var GetURLParameter = function (sParam) {
        var sPageURL = window.location.search.substring(1);
        var sURLVariables = sPageURL.split('&');
        for (var i = 0; i < sURLVariables.length; i++) {
            var sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1];
            }
        }
    }

    // public functions
    return {

        //main function
        init: function () {
            //initialize here something.
            if ($('.table').length > 0) {
                if ($('.actions').length > 0) {
                    $('.table').DataTable({
                        columns: [
                            {orderable: false},
                            null,
                            null,
                            {orderable: false},
                            null,
                            {orderable: false}
                        ],
                        "lengthMenu": [3, 5, 10]
                    });
                } else {
                    $('.table').DataTable({
                        columns: [
                            {orderable: false},
                            null,
                            null,
                            {orderable: false},
                            null
                        ],
                        "lengthMenu": [3, 5, 10]
                    });
                }
                if (GetURLParameter('request') === 'done') {
                    $('.toast').toast('show');
                }
            }

            if($('.login').length > 0) {
                if (GetURLParameter('response') === 'wrong') {
                    $('.toast').toast('show');
                }
            }

        },

        //some helper function
        doSomeStuff: function () {
            myFunc();
        }

    };

}();

jQuery(document).ready(function () {
    ToDo.init();
});

/***
 Usage
 ***/
//Custom.doSomeStuff();