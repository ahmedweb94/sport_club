

      <div class="col-xs-12 col-sm-6 col-md-12 blogBox">
         <div class="item featured">
            <img src="https://www.solodev.com/assets/fancy/travel3.jpg">
         </div>
      </div>


      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox"  style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel5.jpg">
         </div>
      </div>



      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox"  style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel6.jpg">
         </div>
      </div>


      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox"  style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel9.jpg">
         </div>
      </div>



      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox" style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel7.jpg">
         </div>
      </div>



      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox" style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel8.jpg">
         </div>
      </div>


      <div class="col-xs-12 col-sm-6 col-md-4 blogBox moreBox" style="display: none;">
         <div class="item">
            <img src="https://www.solodev.com/assets/fancy/travel2.jpg">
         </div>
      </div>

      <div id="loadMore" style="">
         <a href="#">Load More</a>
      </div>

<script>
$( document ).ready(function () {
		$(".moreBox").slice(0, 3).show();
		if ($(".blogBox:hidden").length != 0) {
			$("#loadMore").show();
		}		
		$("#loadMore").on('click', function (e) {
			e.preventDefault();
			$(".moreBox:hidden").slice(0, 6).slideDown();
			if ($(".moreBox:hidden").length == 0) {
				$("#loadMore").fadeOut('slow');
			}
		});
	});
</script>
