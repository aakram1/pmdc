function close_popup(hidee) {
	document.getElementById(hidee).style.display = 'none';
	return false;
}


function reveal(revealee, hidee) {
   
 if (revealee == "tanda") {
    loadXMLDoc('terms.html');
    }

 if (revealee == "faq") {
    loadXMLDoc2('faq.html');
    }

 if ( hidee == 'none') {
	window.scroll(0,0);
    document.getElementById(revealee).style.display = 'block';
    return false;
	}

    window.scroll(0,0);
    document.getElementById(revealee).style.display = 'block';
    document.getElementById(hidee).style.display = 'none';
    return false;   
}

function loadXMLDoc(url)
{
xmlhttp=null;
if (window.XMLHttpRequest)
  {// code for Firefox, Opera, IE7, etc.
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=state_Change;
  xmlhttp.open("GET",url,true);
  xmlhttp.send(null);
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}
