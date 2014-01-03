<!DOCTYPE html>
<html>
<head>
<script src="http://localhost/notebook.com/public/js/jquery.js"></script>
<script>

$(document).ready(function() {
  $("button").click(function() {
    $.ajax({
      data: {
        name: "Pham Duy Hung",
        email: "superlibra10101991",
      },
      type: "POST",
      url: "http://localhost/notebook.com/index.php/ajax_email_post/index",
      success: function(result) {
        if (result) {
          alert(result);
        } else {
          alert("Boom");
        }
      }
    });
  });
});
</script>
</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>