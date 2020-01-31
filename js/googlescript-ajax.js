// Exports HTML form data to Google Sheet
var $form = $('#register-form'),
  url = 'https://script.google.com/macros/s/AKfycbw2I4X3JdjDteLrLZfC74BbWCJzgCBK5ayTt4kCStw5leK868Fq/exec'

$('#submit-form').on('click', function (e) {
  e.preventDefault();
  var jqxhr = $.ajax({
    url: url,
    method: "GET",
    dataType: "json",
    data: $form.serializeArray()
  }).done(
    alert("Successfully registered!")
  );
})