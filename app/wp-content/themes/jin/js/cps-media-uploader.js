(function ($) {
	
    var custom_uploader;
 
    $(document).on('click', 'input:button[name=media1]', function(e) {
        // add athomemade
        // 配置されたウィジェットのIDを識別する
        var widget_id = "[id*=" + $(this).attr("widgetid") + "]"; 
   
        
        // del athomemade
        // custom_uploaderを使いまわすと、widget_idが初回しかcustom_uploaderにわたらないため、
        // 毎回作り直す（onを登録したい）。そのため下記処理を削除（コメント化）
        // if (custom_uploader) {
        //     custom_uploader.open();
        //     return;
        // }
        custom_uploader = wp.media({
            title: "画像を選んでください",
            library: {
                type: "image"
            },
            button: {
                text: "この画像を選択する"
            },
            multiple: false,
        });
        custom_uploader.on("select", function() {
            var images = custom_uploader.state().get("selection");
            // change athomemade
            // ボタン押下時に取得したwidgetid内の各要素を取得するように修正
			$("input.cps-ranking01").val("");
            $("div#media1").empty();
			$(".cps-ranking01-check").prop('checked', false);
 
            /* file の中に選択された画像の各種情報が入っている */
            images.each(function(file){
                /* テキストフォームと表示されたサムネイル画像があればクリア */
                
				var layout_check = window.localStorage.getItem("result");
                              
				$("div#media1").append('<img src="'+file.attributes.sizes.thumbnail.url+'" />');
				$("input.cps-ranking01").val(file.attributes.sizes.thumbnail.url);
				
            });
        });

 
        custom_uploader.open();
 
    });
	
	/* クリアボタンを押した時の処理 */
    $(document).on('click', 'input:button[name=media1-clear]', function() {
        // add athomemade
        // 配置されたウィジェットのIDを識別する
        var widget_id = "[id*=" + $(this).attr("widgetid") + "]"; 
        // change athomemade
        // ボタン押下時に取得したwidgetid内の各要素を取得するように修正
        $("div#media1").empty();
        $("input.cps-ranking01").val("");
		$(".cps-ranking01-check").prop('checked', false);
        
    });
	
	
	
	
	$(document).on('click', 'input:button[name=media-cat]', function(e) {
        
        // del athomemade
        // custom_uploaderを使いまわすと、widget_idが初回しかcustom_uploaderにわたらないため、
        // 毎回作り直す（onを登録したい）。そのため下記処理を削除（コメント化）
        // if (custom_uploader) {
        //     custom_uploader.open();
        //     return;
        // }
        custom_uploader = wp.media({
            title: "画像を選んでください",
            library: {
                type: "image"
            },
            button: {
                text: "この画像を選択する"
            },
            multiple: false,
        });
        custom_uploader.on("select", function() {
            var images = custom_uploader.state().get("selection");
            // change athomemade
            // ボタン押下時に取得したwidgetid内の各要素を取得するように修正
			$("input.cps-image-cat").val("");
            $("#media-cat").empty();
 
            /* file の中に選択された画像の各種情報が入っている */
            images.each(function(file){
                /* テキストフォームと表示されたサムネイル画像があればクリア */
                              
				$("#media-cat").append('<img src="'+file.attributes.sizes.small_size.url+'" />');
				$("input.cps-image-cat").val(file.attributes.sizes.large_size.url);
				$("input.cps-image-cat-pickup").val(file.attributes.sizes.small_size.url);// ピックアップ用
				
            });
        });

 
        custom_uploader.open();
 
    });
	
	/* クリアボタンを押した時の処理 */
    $(document).on('click', 'input:button[name=media-cat-clear]', function() {

        // ボタン押下時に取得したwidgetid内の各要素を取得するように修正
        $("#media-cat").empty();
        $("input.cps-image-cat").val("");
		$("input.cps-image-cat-pickup").val("");
        
    });
	
})(jQuery);