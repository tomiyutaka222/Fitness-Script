// JavaScript Document

jQuery(function($){

  // Set all variables to be used in scope
  var frame,
      metaBox = $('#my_metabox'), // Your meta box id here
      addFilLink = $('.upload_button', metaBox),
      settingFil = $('#my_box_key', metaBox);
  
  // ADD FILE LINK
  addFilLink.on("click", function( event ){
    
    event.preventDefault();
    
    // If the media frame already exists, reopen it.
    if ( frame ) {
      frame.open();
      return;
    }
    
    // Create a new media frame
    frame = wp.media({
      title: '添付するファイルを選択してください。',
      button: {
        text: 'このファイルを設定'
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    
    // When an image is selected in the media frame...
    frame.on( 'select', function() {
      
      // Get media attachment details from the frame state
      var attachment = frame.state().get('selection').first().toJSON();

      // Send the attachment URL to our custom image input field.
      settingFil.val( attachment.url );

    });

    // Finally, open the modal on click
    frame.open();
  });
});



function CpsBoxCopy(string){
  var temp = document.createElement('div');

  temp.textContent = string;

  var s = temp.style;
  s.position = 'fixed';
  s.left = '-100%';

  document.body.appendChild(temp);
  document.getSelection().selectAllChildren(temp);

  var result = document.execCommand('copy');

  document.body.removeChild(temp);
  return result;
}


jQuery(function($){
	var textarea1 = document.getElementById("textarea1");
	var button1 = document.getElementById("button1");

	$('#button1').click(function(){
		if(CpsBoxCopy(textarea1.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});


	var textarea2 = document.getElementById("textarea2");
	var button2 = document.getElementById("button2");
	$('#button2').click(function(){
		if(CpsBoxCopy(textarea2.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea3 = document.getElementById("textarea3");
	var button3 = document.getElementById("button3");
	$('#button3').click(function(){
		if(CpsBoxCopy(textarea3.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea4 = document.getElementById("textarea4");
	var button4 = document.getElementById("button4");
	$('#button4').click(function(){
		if(CpsBoxCopy(textarea4.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea5 = document.getElementById("textarea5");
	var button5 = document.getElementById("button5");
	$('#button5').click(function(){
		if(CpsBoxCopy(textarea5.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea6 = document.getElementById("textarea6");
	var button6 = document.getElementById("button6");
	$('#button6').click(function(){
		if(CpsBoxCopy(textarea6.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea7 = document.getElementById("textarea7");
	var button7 = document.getElementById("button7");
	$('#button7').click(function(){
		if(CpsBoxCopy(textarea7.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea8 = document.getElementById("textarea8");
	var button8 = document.getElementById("button8");
	$('#button8').click(function(){
		if(CpsBoxCopy(textarea8.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea9 = document.getElementById("textarea9");
	var button9 = document.getElementById("button9");
	$('#button9').click(function(){
		if(CpsBoxCopy(textarea9.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea10 = document.getElementById("textarea10");
	var button10 = document.getElementById("button10");
	$('#button10').click(function(){
		if(CpsBoxCopy(textarea10.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea11 = document.getElementById("textarea11");
	var button11 = document.getElementById("button11");
	$('#button11').click(function(){
		if(CpsBoxCopy(textarea11.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea12 = document.getElementById("textarea12");
	var button12 = document.getElementById("button12");
	$('#button12').click(function(){
		if(CpsBoxCopy(textarea12.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea13 = document.getElementById("textarea13");
	var button13 = document.getElementById("button13");
	$('#button13').click(function(){
		if(CpsBoxCopy(textarea13.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea14 = document.getElementById("textarea14");
	var button14 = document.getElementById("button14");
	$('#button14').click(function(){
		if(CpsBoxCopy(textarea14.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea15 = document.getElementById("textarea15");
	var button15 = document.getElementById("button15");
	$('#button15').click(function(){
		if(CpsBoxCopy(textarea15.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea16 = document.getElementById("textarea16");
	var button16 = document.getElementById("button16");
	$('#button16').click(function(){
		if(CpsBoxCopy(textarea16.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea17 = document.getElementById("textarea17");
	var button17 = document.getElementById("button17");
	$('#button17').click(function(){
		if(CpsBoxCopy(textarea17.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea18 = document.getElementById("textarea18");
	var button18 = document.getElementById("button18");
	$('#button18').click(function(){
		if(CpsBoxCopy(textarea18.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea19 = document.getElementById("textarea19");
	var button19 = document.getElementById("button19");
	$('#button19').click(function(){
		if(CpsBoxCopy(textarea19.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea20 = document.getElementById("textarea20");
	var button20 = document.getElementById("button20");
	$('#button20').click(function(){
		if(CpsBoxCopy(textarea20.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});

	var textarea21 = document.getElementById("textarea21");
	var button21 = document.getElementById("button21");
	$('#button21').click(function(){
		if(CpsBoxCopy(textarea21.value)){
			return false;
		}else{
			alert('このブラウザでは対応していません');
			return false;
		}
	});
});