<?php 

      if ($_SESSION['message'] != "") {
        echo 
        '<div id="message">
          <div style="position:absolute;top:0;right:0;">
            <button class="mdl-button mdl-js-button mdl-button--icon" id="clsMsg">
              <i class="material-icons">clear</i>
            </button>
          </div>
          '.$_SESSION['message'].'
        </div>
        <script type="text/javascript">
          $("#message").fadeIn(200).delay(5000).fadeOut(200);
          $(document).ready(function(){
              $("#clsMsg").click(function(){
                  $("#message").hide();
              });         
          });          
        </script>';
      }

      unset($_SESSION["message"]);

?>