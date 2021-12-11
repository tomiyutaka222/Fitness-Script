// JavaScript Document

(function (richText, element, editor) {
    var marker = 'jin-gb-inline/marker1';
	var marker_title = 'JINマーカー１';
	var marker_class = 'marker';
	
	var marker2 = 'jin-gb-inline/marker2';
	var marker2_title = 'JINマーカー２';
	var marker2_class = 'marker2';

	var keyboard = 'jin-gb-inline/keyboard';
	var keyboard_title = 'JINキーボード';
	var keyboard_class = 'jin-keyboard';
	
    richText.registerFormatType(marker, {
        title: marker_title,
        tagName: 'span',
        className: marker_class,
        edit: function (args) {
            return element.createElement(editor.RichTextToolbarButton, {
                icon: 'admin-customizer',
                title: marker_title,
                onClick: function () {
                    args.onChange(richText.toggleFormat(args.value, {
                        type: marker
                    }));
                },
                isActive: args.isActive,
            });
        },
    });
	richText.registerFormatType(marker2, {
        title: marker2_title,
        tagName: 'span',
        className: marker2_class,
        edit: function (args) {
            return element.createElement(editor.RichTextToolbarButton, {
                icon: 'admin-customizer',
                title: marker2_title,
                onClick: function () {
                    args.onChange(richText.toggleFormat(args.value, {
                        type: marker2
                    }));
                },
                isActive: args.isActive,
            });
        },
    });
	richText.registerFormatType(keyboard, {
        title: keyboard_title,
        tagName: 'span',
        className: keyboard_class,
        edit: function (args) {
            return element.createElement(editor.RichTextToolbarButton, {
                icon: 'button',
                title: keyboard_title,
                onClick: function () {
                    args.onChange(richText.toggleFormat(args.value, {
                        type: keyboard
                    }));
                },
                isActive: args.isActive,
            });
        },
    });
}(
    window.wp.richText,
    window.wp.element,
    window.wp.editor
));



//JINシンプルボックスブロック


(function (prop) {
	var bl = wp.blocks.registerBlockType;
	var el = wp.element.createElement;

	bl(
		'jin-gb-block/box', {
			title: 'シンプルボックス',
			icon: function(){
				return el(
					'img',
					{src:jin_inst_dir.install_dir+'/img/notitle-box-icon.png'}
				);
			},
			category: 'jin-block',
			keywords:['シンプルボックス','box','JIN'],
			attributes:{
				boxStyle:{
					type:'string',
					default:'simple-box1',
				}
			},
			edit: function (props) {
				var boxStyleList=[
				{
					value:'simple-box1',
					label:'太枠ボックス'
				},{
					value:'simple-box2',
					label:'太点線ボックス'
				},{
					value:'simple-box3',
					label:'二重線ボックス'
				},{
					value:'simple-box4',
					label:'細枠背景色ボックス'
				},{
					value:'simple-box5',
					label:'細点線背景色ボックス'
				},{
					value:'simple-box6',
					label:'背景色ボックス'
				},{
					value:'simple-box7',
					label:'太枠背景色ボックス'
				},{
					value:'simple-box8',
					label:'左線ボックス'
				},{
					value:'simple-box9',
					label:'端折れボックス'
				},{
					value:'concept-box2',
					label:'注意点ボックス'
				},{
					value:'concept-box3',
					label:'良い例ボックス'
				},{
					value:'concept-box4',
					label:'悪い例ボックス'
				},{
					value:'concept-box5',
					label:'参考ボックス'
				},{
					value:'concept-box6',
					label:'メモボックス'
				},{
					value:'concept-box1',
					label:'ポイントボックス'
				}];
				return el(
					wp.element.Fragment,null,
						el(
							wp.editor.InspectorControls,{
								key:'inspector',
							},
							el(
								wp.components.PanelBody,{
									title:'ボックスデザイン',
								},
								el(
									wp.components.SelectControl,{
										options:boxStyleList,
										value:props.attributes.boxStyle,
										onChange: function (changedContent) { props.setAttributes({ boxStyle: changedContent });}
									}
								)
							)
						),
						el('div', {className: props.attributes.boxStyle,},
							el(
								wp.editor.InnerBlocks,{
									allowedBlocks:'all',
								}
							)
						)
					)
			},
			save: function (props) {
				return el( 
						'div', {className: props.attributes.boxStyle,},
						el( wp.editor.InnerBlocks.Content )
				)
			},
		}
	);
})();



//JIN見出し付きボックスブロック

(function (prop) {
	var bl = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	bl(
		'jin-gb-block/box-with-headline', {
			title: '見出し付きボックス',
			icon: function(){
				return el(
					'img',
					{src:jin_inst_dir.install_dir+'/img/box-icon.png'}
				);
			},
			category: 'jin-block',
			keywords:['見出し付きボックス','box','JIN'],
			attributes:{
				boxStyle:{
					type:'string',
					default:'kaisetsu-box1',
				},
				boxTitle:{
					type:'string',
					selector: 'div',
				},
			},
			edit: function (props) {
				var boxStyleList=[
				{
					value:'kaisetsu-box1',
					label:'背景色付きボックス１'
				},{
					value:'kaisetsu-box5',
					label:'背景色付きボックス２'
				},{
					value:'kaisetsu-box2',
					label:'細線ボックス１'
				},{
					value:'kaisetsu-box4',
					label:'細線ボックス２'
				},{
					value:'innerlink-box1',
					label:'細線背景色付きボックス'
				},{
					value:'kaisetsu-box3',
					label:'黒板ボックス'
				}];
				return el(
					wp.element.Fragment,null,
						el(
							wp.editor.InspectorControls,{
								key:'inspector',
							},
							el(
								wp.components.PanelBody,{
									title:'ボックスデザイン',
								},
								el(
									wp.components.SelectControl,{
										options:boxStyleList,
										value:props.attributes.boxStyle,
										onChange: function (changedContent) {props.setAttributes({ boxStyle: changedContent });}
									}
								)
							)
						),
						el('div', {
							className: props.attributes.boxStyle
						},el(
							wp.editor.RichText,{
									value:props.attributes.boxTitle,
									tagName:'div',
									className:props.attributes.boxStyle+'-title',
									placeholder:'ここにタイトルを入力',
									onChange: function (changedContent) {props.setAttributes({ boxTitle: changedContent });}
								}
							),
							el(
								wp.editor.InnerBlocks,{
									allowedBlocks:'all',
								}
							)
						)
					)
			},
			save: function (props) {
				return el( 
						'div', {className: props.attributes.boxStyle,},
						el( 
							wp.editor.RichText.Content,{
								value:props.attributes.boxTitle,
								tagName:'div',
								className:props.attributes.boxStyle+'-title'
							}
						),
						el( wp.editor.InnerBlocks.Content )
				)
			},
		}
	);
})();



//JINアイコンボックスブロック

(function (prop) {
	var bl = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	bl(
		'jin-gb-block/icon-box', {
			title: 'アイコンボックス',
			icon: function(){
				return el(
					'img',
					{src:jin_inst_dir.install_dir+'/img/icon-box-icon.png'}
				);
			},
			category: 'jin-block',
			keywords:['アイコンボックス','box','JIN'],
			attributes:{
				boxStyle:{
					type:'string',
					default:'caution',
				},
			},
			edit: function (props) {
				var boxStyleList=[
				{
					value:'caution',
					label:'注意'
				},{
					value:'star',
					label:'星'
				},{
					value:'bulb',
					label:'電球'
				},{
					value:'cart',
					label:'カート'
				},{
					value:'speaker',
					label:'お知らせ'
				},{
					value:'comment',
					label:'吹き出し'
				},{
					value:'checkcircle',
					label:'チェック'
				},{
					value:'pencil',
					label:'鉛筆'
				},{
					value:'information',
					label:'情報'
				},{
					value:'gear',
					label:'歯車'
				},{
					value:'clipboard',
					label:'クリップボード'
				},{
					value:'like',
					label:'いいね！'
				},{
					value:'unlike',
					label:'よくない'
				},{
					value:'heart',
					label:'ハート'
				},{
					value:'question',
					label:'はてなマーク'
				},{
					value:'flag',
					label:'旗'
				}];
				return el(
					wp.element.Fragment,null,
						el(
							wp.editor.InspectorControls,{
								key:'inspector',
							},
							el(
								wp.components.PanelBody,{
									title:'ボックスの種類',
								},
								el(
									wp.components.SelectControl,{
										options:boxStyleList,
										value:props.attributes.boxStyle,
										onChange: function (changedContent) {props.setAttributes({ boxStyle: changedContent });}
									}
								)
							),
							el(
								wp.components.BaseControl,{
									label:'※アイコンはリアルタイムで変更が反映されません。記事を公開・更新し、ページをリロードすると反映されます。',
									className:'gb-attention-comment'
								}
							)
						),
						el('div', {className: 'jin-icon-'+props.attributes.boxStyle+' jin-iconbox',},
						   el('div', {className: 'jin-iconbox-icons'},
							  el('i', {
									className: 'jic jin-ifont-'+props.attributes.boxStyle+' jin-icons'}
								)
							),
							el('div', {className: 'jin-iconbox-main'},
								el(
									wp.editor.InnerBlocks,{
										allowedBlocks:'all',
									}
								)
							)
						)
					)
			},
			save: function (props) {
				return el( 'div', {className: 'jin-icon-'+props.attributes.boxStyle+' jin-iconbox',},
						el('div', {className: 'jin-iconbox-icons'},
							el('i', {
								className: 'jic jin-ifont-'+props.attributes.boxStyle+' jin-icons'}
							)
						),
						el('div', {className: 'jin-iconbox-main'},
							el( wp.editor.InnerBlocks.Content )
						)
					)
			},
		}
	);
})();



//JINシンプルボタンブロック
(function (prop) {
	var bl = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	bl(
		'jin-gb-block/simple-button', {
			title: 'シンプルボタン',
			icon: function(){
				return el(
					'img',
					{src:jin_inst_dir.install_dir+'/img/button-icon.png'}
				);
			},
			category: 'jin-block',
			keywords:['シンプルボタン','button','JIN'],
			attributes:{
				buttonStyle:{
					type:'string',
					default:'color-button01',
				},
				buttonText:{
					type:'string',
					default:'シンプルボタン',
				},
				buttonUrl:{
					type:'string',
				},
				trackingImg:{
					type:'string',
				},
				buttonTarget:{
					type:'boolean',
				},
			},
			edit: function (props) {
				var buttonStyleList=[
				{
					value:'color-button01',
					label:'ボタン１'
				},{
					value:'color-button02',
					label:'ボタン２'
				},{
					value:'color-button01-big',
					label:'カスタムボタン１'
				},{
					value:'color-button02-big',
					label:'カスタムボタン２'
				}];

				return el(
					wp.element.Fragment,null,
						el(
							wp.editor.InspectorControls,{
								key:'inspector',
							},
							el(
								wp.components.PanelBody,{
									title:'ボタンの種類',
								},
								el(
									wp.components.SelectControl,{
										options:buttonStyleList,
										value:props.attributes.buttonStyle,
										onChange: function (changedContent) {props.setAttributes({ buttonStyle: changedContent });}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'ボタンテキスト',
								},
								el(
									wp.components.TextControl,{
										placeholder:'ここにボタンの文字を入力',
										value:props.attributes.buttonText,
										onChange: function (changedContent) {props.setAttributes({ buttonText: changedContent });}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'リンク先URL',
								},
								el(
									wp.components.TextareaControl,{
										placeholder:'【例】https://jinpr.com/123',
										value:props.attributes.buttonUrl,
										onChange: function (changedContent) {props.setAttributes({ buttonUrl: changedContent });}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'アフィリエイトコードのimgタグ',
								},
								el(
									wp.components.TextareaControl,{
										placeholder:'例えば、<img src="https://jinpr.com/123" height="1" width="1" border="0">となっているなら、「https://jinpr.com/123」の部分だけを入力してください。',
										value:props.attributes.trackingImg,
										onChange: function (changedContent) {
											props.setAttributes({ trackingImg: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'リンク先を別タブで開く',
								},
								el(
									wp.components.CheckboxControl,{
										label:"ON",
										checked:props.attributes.buttonTarget,
										onChange: function (changedContent) {
											props.setAttributes({ buttonTarget: changedContent });
										}
									}
								)
							)
						),
						el('p',{className:'gb-simple-button-center'},
							el('span', {className: props.attributes.buttonStyle,},
								el('a', {
									href: props.attributes.buttonUrl,
									target: props.attributes.buttonTarget,
									target:props.attributes.buttonTarget ? '_blank' : null,
									rel:props.attributes.buttonTarget ? 'noopener noreferrer' : null,
								},
									props.attributes.buttonText
								),
							   el('img',{border:0,width:1,height:1,alt:"",src:props.attributes.trackingImg})
							)
						)
					)
			},
			save: function (props) {
				return el('p',{className:'gb-simple-button-center'},
						el( 'span', {className: props.attributes.buttonStyle},el('a', {
								href: props.attributes.buttonUrl,
								target: props.attributes.buttonTarget,
								target:props.attributes.buttonTarget ? '_blank' : null,
								rel:props.attributes.buttonTarget ? 'noopener noreferrer' : null,
							},props.attributes.buttonText),
						   el('img',{border:0,width:1,height:1,alt:"",src:props.attributes.trackingImg})
						))
			},
		}
	);
})();



//JINリッチボタンブロック
(function (prop) {
	var bl = wp.blocks.registerBlockType;
	var el = wp.element.createElement;
	bl(
		'jin-gb-block/rich-button', {
			title: 'リッチボタン',
			icon: function(){
				return el(
					'img',
					{src:jin_inst_dir.install_dir+'/img/button-rich-icon.png'}
				);
			},
			category: 'jin-block',
			keywords:['リッチボタン','button','JIN'],
			attributes:{
				buttonStyle:{
					type:'string',
					default:'flat',
				},
				buttonHover:{
					type:'string',
					default:'down',
				},
				buttonColor1:{
					type:'string',
					default:'#5ba9f7',
				},
				buttonColor2:{
					type:'string',
					default:'',
				},
				buttonRadius:{
					type:'number',
					default:'40',
				},
				buttonText:{
					type:'string',
					default:'リッチボタン',
				},
				buttonUrl:{
					type:'string',
				},
				trackingImg:{
					type:'string',
				},
				buttonTarget:{
					type:'boolean',
				},
			},
			edit: function (props) {
				var buttonStyleList=[
				{
					value:'flat',
					label:'フラットボタン'
				},{
					value:'shiny',
					label:'光るボタン'
				},{
					value:'float',
					label:'ふわふわボタン'
				},{
					value:'bound',
					label:'バウンドボタン'
				}];
				var buttonHoverList=[
				{
					value:'down',
					label:'押し込む'
				},{
					value:'up',
					label:'膨らむ'
				},{
					value:'hop',
					label:'持ち上げる'
				}];
				var buttonTargetList=[
				{
					value:'_self',
					label:'OFF'
				},{
					value:'_blank',
					label:'ON'
				}];
				var buttonColor1List=[
					{color:'#2b2b2b',name:'#2b2b2b'},
					{color:'#4496d3',name:'#4496d3'},
					{color:'#00afcc',name:'#00afcc'},
					{color:'#3eb370',name:'#3eb370'},
					{color:'#fbca4d',name:'#fbca4d'},
					{color:'#f39800',name:'#f39800'},
					{color:'#f26a6a',name:'#f26a6a'},
					{color:'#f490bd',name:'#f490bd'},
					{color:'#dab6ed',name:'#dab6ed'},
					{color:'#c1bbea',name:'#c1bbea'},
					{color:'#89c3eb',name:'#89c3eb'},
				];
				var buttonColor2List=[
					{color:'#fff3b8',name:'#fff3b8'},
					{color:'#4496d3',name:'#4496d3'},
					{color:'#00afcc',name:'#00afcc'},
					{color:'#3eb370',name:'#3eb370'},
					{color:'#fbca4d',name:'#fbca4d'},
					{color:'#f39800',name:'#f39800'},
					{color:'#f26a6a',name:'#f26a6a'},
					{color:'#f490bd',name:'#f490bd'},
					{color:'#dab6ed',name:'#dab6ed'},
					{color:'#c1bbea',name:'#c1bbea'},
					{color:'#89c3eb',name:'#89c3eb'},
				];
				return el(
					wp.element.Fragment,null,
						el(
							wp.editor.InspectorControls,{
								key:'inspector',
							},
							el(
								wp.components.PanelBody,{
									title:'ボタンの種類',
								},
								el(
									wp.components.SelectControl,{
										options:buttonStyleList,
										value:props.attributes.buttonStyle,
										onChange: function (changedContent) {
											props.setAttributes({ buttonStyle: changedContent });
										}
									}
								)
							),
							el(
								wp.editor.PanelColorSettings,{
									title:'ボタンの色',
									colorValue:props.attributes.buttonColor1,
									colorSettings:[{
										onChange: function (changedContent){
											if( changedContent === void 0 ){
												return props.setAttributes({buttonColor1: "" });
											}else{
												return props.setAttributes({buttonColor1: changedContent });
											}
										},
										value:props.attributes.buttonColor1,
										colors:buttonColor1List,
										label:'選択中の色'
									}]
								}
							),
							el(
								wp.editor.PanelColorSettings,{
									title:'ボタンをグラデーションにする',
									colorValue:props.attributes.buttonColor2,
									colorSettings:[{
										value:props.attributes.buttonColor2,
										onChange: function (changedContent){
											if( changedContent === void 0 ){
												return props.setAttributes({buttonColor2: ""});
											}else{
												return props.setAttributes({buttonColor2: changedContent });
											}
										},
										colors:buttonColor2List,
										label:'選択中の色'
									}]
								},
								el(
									wp.components.BaseControl,{
										label:'※単色に戻すには「クリア」してください。ただしリアルタイムで変更が反映されません。記事を公開・更新し、ページをリロードすると反映されます。',
										className:'gb-attention-comment'
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'ボタンのホバーアクション',
								},
								el(
									wp.components.SelectControl,{
										options:buttonHoverList,
										value:props.attributes.buttonHover,
										onChange: function (changedContent) {
											props.setAttributes({ buttonHover: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'ボタンの丸み',
								},
								el(
									wp.components.RangeControl,{
										value:props.attributes.buttonRadius,
										min:0,
										max:50,
										step:1,
										onChange: function (changedContent) {
											props.setAttributes({ buttonRadius: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'ボタンテキスト',
								},
								el(
									wp.components.TextControl,{
										placeholder:'ここにボタンの文字を入力',
										value:props.attributes.buttonText,
										onChange: function (changedContent) {
											props.setAttributes({ buttonText: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'リンク先URL',
								},
								el(
									wp.components.TextareaControl,{
										placeholder:'【例】https://jinpr.com/123',
										value:props.attributes.buttonUrl,
										onChange: function (changedContent) {
											props.setAttributes({ buttonUrl: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'アフィリエイトコードのimgタグ',
								},
								el(
									wp.components.TextareaControl,{
										placeholder:'例えば、<img src="https://jinpr.com/123" height="1" width="1" border="0">となっているなら、「https://jinpr.com/123」の部分だけを入力してください。',
										value:props.attributes.trackingImg,
										onChange: function (changedContent) {
											props.setAttributes({ trackingImg: changedContent });
										}
									}
								)
							),
							el(
								wp.components.PanelBody,{
									title:'リンク先を別タブで開く',
								},
								el(
									wp.components.CheckboxControl,{
										label:"ON",
										checked:props.attributes.buttonTarget,
										onChange: function (changedContent) {
											props.setAttributes({ buttonTarget: changedContent });
										}
									}
								)
							)
						),
					
						el('div',{className:'jin-flexbox'},
							el('div', {className: 'jin-shortcode-button jsb-visual-'+props.attributes.buttonStyle+' jsb-hover-'+props.attributes.buttonHover,},
								el('a', {
									style:{borderRadius:props.attributes.buttonRadius+'px',backgroundColor:props.attributes.buttonColor1,background: 'linear-gradient(107.61deg, ' +props.attributes.buttonColor1+' 7.99%, '+props.attributes.buttonColor2+' 91.12%)'},
									href: props.attributes.buttonUrl,
									target:props.attributes.buttonTarget ? '_blank' : null,
									rel:props.attributes.buttonTarget ? 'noopener noreferrer' : null,
								},
									props.attributes.buttonText
								),
							    el('img',{border:0,width:1,height:1,alt:"",src:props.attributes.trackingImg})
							)
						)
					)
			},
			save: function (props) {
				return el('div',{className:'jin-flexbox'},
						el( 'div', {className: 'jin-shortcode-button jsb-visual-'+props.attributes.buttonStyle+' jsb-hover-'+props.attributes.buttonHover},
						  el('a', {
								style:{borderRadius:props.attributes.buttonRadius+'px',backgroundColor:props.attributes.buttonColor1,background: 'linear-gradient(107.61deg, ' +props.attributes.buttonColor1+' 7.99%, '+props.attributes.buttonColor2+' 91.12%)'},
								href: props.attributes.buttonUrl,
								target:props.attributes.buttonTarget ? '_blank' : null,
								rel:props.attributes.buttonTarget ? 'noopener noreferrer' : null,
							},
							   props.attributes.buttonText
							),
						    el('img',{border:0,width:1,height:1,alt:"",src:props.attributes.trackingImg})
						)
						  )
			},
		}
	);
})();