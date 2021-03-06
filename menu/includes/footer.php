    <footer id="footer" style="padding: 2em;">
        <div class="row">
            <div class="col-md-4">
                <header>
                    <h3>Opening Hours</h3>
                </header>
                <div class="row">
                    <div class="col-xs-6" style="text-align: right">
                        Monday:<br/>Tuesday:<br/>Wednesday:<br/>Thursday:<br/>Friday:<br/>Sartuday:<br/>Sunday:
                    </div>
                    <div class="col-xs-6" style="text-align: left">
                        11:00am - 9:00pm<br/>Closed<br/>11:00am - 9:00pm<br/>11:00am - 9:00pm<br/>11:00am - 9:00pm<br/>11:00am - 9:00pm<br/>11:00am - 9:00pm
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <header>
                    <h3>Location</h3>
                </header>
                <p>7035 W Grand Pkwy S, Richmond, Texas 77407</p>
            </div>
            <div class="col-md-4">
                <header>
                    <h3>Contact</h3>
                    <h4>Visit us at <span style="font-size: 150%">
                        <a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a>
                        <a href="https://www.facebook.com/Viet-Soul-Pho-and-Sandwiches-943765575658874/" class="icon alt fa-facebook"><span class="label">Facebook</span></a>
                        <a href="http://www.yelp.com/biz/viet-soul-richmond" class="icon alt fa-yelp"><span class="label">Yelp</span></a>
                    </span></h4>
                </header>
            </div>
        </div>

        <ul class="copyright">
            <li>&copy; VietSoul 2016. All rights reserved.</li><li>Design: HTML5 UP</li><li>Powered: DucTruong</li>
        </ul>
    </footer>

</div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/jquery.scrolly.min.js"></script>
    <script src="../assets/js/jquery.dropotron.min.js"></script>
    <script src="../assets/js/jquery.scrollex.min.js"></script>
    <script src="../assets/js/skel.min.js"></script>
    <script src="../assets/js/util.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="../assets/js/main.js"></script>

<script type="text/javascript">
$(function (){
    $.ajax({url: "menuDisplay.php", success: function(result){
        $("#menuContent").html(result);
    }});
    $(".toTop").hide();
    $(document).scroll(function() {
        if($(document).scrollTop() > 300)
            $(".toTop").fadeIn();
        else $(".toTop").fadeOut();
    });
    $("#cartItems").text("<?php
$totalItems = 0;
if (isset($_SESSION['cart_array'])) {
	foreach ($_SESSION['cart_array'] as $each_item) {
		$totalItems += $each_item['quantity'];
	}
}
echo $totalItems;
?>");

});

function display(a){
    $.get("menuDisplay.php", {id: a}, function(result){$("#menuContent").html(result);});
}

// Searchbtn Clicked
$("#searchbtn").click(function(){
    var a = $('[name="search"]').val();
    $.get("menuDisplay.php", {search: a}, function(result){$("#menuContent").html(result);});
});

// Searchbtn EnterKey pressed
$('[name="search"]').keypress(function(a){
    if(a.keyCode === 13){
        $('#searchbtn').click();
    }
});
</script>

<script type="text/javascript">
function submitData(obj)
{
  var formData = {
    'product_ID'  : $(obj).find("#product_ID").val()
  };

  $.ajax({
      type        : 'POST',
      url         : 'cart.php',
      data        : formData,
  }).done(function (){
    $("#cartItems").text("<?php
$totalItems = 0;
if (isset($_SESSION['cart_array'])) {
	foreach ($_SESSION['cart_array'] as $each_item) {
		$totalItems += $each_item['quantity'];
	}
}
echo $totalItems;
?>");
  });

return false;
}

</script>

<?php mysqli_close($connection);?>

</body>
</html>