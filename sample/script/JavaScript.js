function toggle() {
if((document.getElementById("text_box_h1").style.display=='none')&&(document.getElementById("table_h1").style.display=='none') && (document.getElementById("table_h2").style.display=='none') && (document.getElementById("table_h3").style.display=='none')){
  document.getElementById("text_box_h1").style.display = '';
  document.getElementById("table_h1").style.display = '';
  document.getElementById("table_h2").style.display = '';
  document.getElementById("table_h3").style.display = '';
 if((document.getElementById("text_box").style.display=='none')&&(document.getElementById("hidethis1").style.display=='none') && (document.getElementById("hidethis2").style.display=='none') && (document.getElementById("infl_no").style.display=='none')){
	  document.getElementById("text_box").style.display = '';
      document.getElementById("hidethis1").style.display = '';
	  document.getElementById("hidethis2").style.display = '';
	  document.getElementById("infl_no").style.display = '';
	 }else{

   document.getElementById("hidethis1").style.display = 'none';
   document.getElementById("hidethis2").style.display = 'none';
  }
}
}

