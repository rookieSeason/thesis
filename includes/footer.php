<div class="footer ">
    <span>Relocation Management Information System (2022)</span>
</div>

<!--ajax Notification-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js"></script> -->
<script>
//$(document).ready(function() {
function load_unseen_notification(view) {

    $.ajax({
        url: "../../php_actions/fetch.php",
        method: "POST",
        data: {
            viewd: view
        },
        dataType: "json",
        /*beforeSend: function() {
            alert("WOW!");
        },*/
        success: function(data) {
            if (data.unseen_notification > 0) {
                $('.notif1').html(data.unseen_notification).addClass(
                    "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger notif1"
                );
                $('.notif').html(data.unseen_notification).addClass("ms-1 badge bg-danger notif");
            }
        }
    });
}


setInterval(function() {
    load_unseen_notification('no');
}, 1000);
//})
$("#manage3").on("click", function() {

    load_unseen_notification('yes');
});
</script>

<!-- Ajax notification for concerns -->

<script>
function load_unseen_notification_concern(concern) {

    $.ajax({
        url: "../../php_actions/fetch.php",
        method: "POST",
        data: {
            concerns: concern
        },
        dataType: "json",
        /*beforeSend: function() {
            alert("WOW!");
        },*/
        success: function(concern) {
            if (concern.unseen_notification_concern > 0) {
                $('.concern1').html(concern.unseen_notification_concern).addClass(
                    "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger concern1"
                );
                $('.concern').html(concern.unseen_notification_concern).addClass(
                    "badge bg-danger concern");
            }
        }
    });
}
setInterval(function() {
    load_unseen_notification_concern('no');
}, 1000);
//})
$("#concern").on("click", function() {

    load_unseen_notification_concern('yes');
});
</script>

<!-- Ajax notification for requirements -->

<script>
function load_unseen_notification_requirement(requirement) {

    $.ajax({
        url: "../../php_actions/fetch.php",
        method: "POST",
        data: {
            requirements: requirement
        },
        dataType: "json",
        /*beforeSend: function() {
            alert("WOW!");
        },*/

        success: function(requirement) {

            if (requirement.unseen_notification_requirement > 0) {
                $('.requirement1').html(requirement.unseen_notification_requirement).addClass(
                    "position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger requirement1"
                );
                $('.requirement').html(requirement.unseen_notification_requirement).addClass(
                    "badge bg-danger requirement"
                );
            }
        }
    });
}
setInterval(function() {
    load_unseen_notification_requirement('no');
}, 1000);
//})
$("#requirement").on("click", function() {

    load_unseen_notification_requirement('yes');
});
</script>
<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
// Dynamic Alert - lESTER
<?php
    if (!empty($_SESSION['nMessage'])) {
    ?>
const notyf = new Notyf();
notyf.open({
    type: '<?php echo $_SESSION['nMessage'][1]; ?>',
    message: '<?php echo $_SESSION['nMessage'][0]; ?>',
    duration: 5000,
    ripple: false,
    dismissible: true,
    position: {
        x: 'right',
        y: 'top'
    }
});
<?php unset($_SESSION['nMessage']);
    } ?>
</script>
<script>
// Dynamic Alert for every new data entry - lESTER

setInterval(newNotyf, 5000);

function newNotyf() {
    notif = localStorage.getItem("notif");

    if (notif == "Hi") {
        console.log(localStorage.getItem("notif"));
        const notyf = new Notyf();
        notyf.open({
            background: '#007bff',
            type: 'info',
            message: 'hello',
            duration: 5000,
            ripple: false,
            dismissible: true,
            position: {
                x: 'left',
                y: 'bottom'
            }
        });

        // localStorage.clear();

    }
}
</script>
</body>


</html>