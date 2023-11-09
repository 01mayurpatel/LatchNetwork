function contactUs() {
  var data = $("#contact-form").serialize();
  $.ajax({
      url: "contact_ajax.php",
      data: data,
      type: "POST",
      success: function (result) {
          confirm("Thanks! We will contact you soon!");
          window.location.replace("index.html");

      }
  });
}

function builders() {
  var data = $("#builders-form").serialize();
  $.ajax({
      url: "contact_ajax.php",
      data: data,
      type: "POST",
      success: function (result) {
          confirm("Thanks! We will contact you soon!");
          window.location.replace("index.html");

      }
  });
}
