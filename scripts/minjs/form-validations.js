function onError(e,r,a){var t=document.createElement("span");r.className+=" has-error",t.setAttribute("class","error-validation"),t.appendChild(document.createTextNode(a)),e.insertBefore(t,r)}function validateForm(){for(var e=/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/,r=document.forms[0],a=!0,t=r.getElementsByClassName("has-error"),n=r.getElementsByClassName("error-validation"),o=0;o<t.length;o++)t[o].className=t[o].className.replace("has-error","");for(var o=0;o<n.length;o++)r.removeChild(n[o]);for(var o=0;o<r.elements.length;o++){var s=r.elements[o];s.required&&(s.value?"mail"!==s.name||e.test(s.value)?"name"!==s.name||/^[a-zA-Z ]+$/.test(s.value)||(onError(r,s,"Can only contain letters"),a=!1):(onError(r,s,"Must be a valid email"),a=!1):(onError(r,s,"Can not be blank"),a=!1))}return a}