function onError(form, e, msg) {
  var error = document.createElement('span');

  e.className += ' has-error';
  error.setAttribute('class', 'error-validation')
  error.appendChild(document.createTextNode(msg));
  form.insertBefore(error, e);
}

function validateForm() {
  var email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/
  var form = document.forms[0];
  var validates = true;
  var fields = form.getElementsByClassName('has-error');
  var errormsgs = form.getElementsByClassName('error-validation');

  for (var i = 0; i < fields.length; i++) {
    fields[i].className = fields[i].className.replace('has-error', '');
  }

  for (var i = 0; i < errormsgs.length; i++) {
    form.removeChild(errormsgs[i]);
  }

  for (var i = 0; i < form.elements.length; i++) {
    var elem = form.elements[i];

    if (elem.required) {
      if (!elem.value) {
        onError(form, elem, 'Can not be blank');
        validates = false;
      } else if (elem.name === 'mail' && !email.test(elem.value)) {
        onError(form, elem, 'Must be a valid email');
        validates = false;
      } else if (elem.name === 'name' && !(/^[a-zA-Z ]+$/.test(elem.value))) {
        onError(form, elem, 'Can only contain letters');
        validates = false;
      }
    }
  }

  return validates;
}