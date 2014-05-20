/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.forcePasteAsPlainText = true;
	CKEDITOR.addStylesSet( 'my_styles',
[
    // Block Styles
    { name : 'Blocked H2', element : 'h2', styles : { 'background-color' : '#5E3A91', 'color':'#FFFFFF', 'display':'block', 'margin':'1.5em 0 1.6em 0', 'line-height':'1.8em',  'padding-left':'12px' } },
	 { name : 'Blue Title', element : 'h2', styles : { 'color' : 'Blue' } },
    { name : 'Red Title' , element : 'h3', styles : { 'color' : 'Red' } },

    // Inline Styles
    { name : 'CSS Style', element : 'span', attributes : { 'class' : 'my_style' } },
    { name : 'Marker: Yellow', element : 'span', styles : { 'background-color' : 'Yellow' } }
]);
config.stylesCombo_stylesSet = 'my_styles';

//background-color:#5E3A91; color:#FFFFFF; display:block; margin:1.5em 0 1.6em 0; line-height:1.8em; padding-left:12px; 
	
config.toolbar = 'SBS';
config.resize_enabled = true;

config.toolbar_SBSFull =
[
    ['Source','-','Save','NewPage','Preview','-','Templates'],
    ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
    ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
   
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
    
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
    ['Maximize', 'ShowBlocks','-','About']
];

config.toolbar_SBSMedium =
[
    ['Source','-','Save','Preview'],
    ['PasteText','PasteFromWord'],
    ['Undo','Redo','SelectAll','RemoveFormat'],
   
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor'],
    ['Image','Table','HorizontalRule','SpecialChar'],
    
    ['Styles','Format','Font','FontSize'],
    ['TextColor','BGColor'],
];

config.toolbar_SBSBasic =
[
    ['Source','PasteText', 'PasteFromWord','JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'Bold', 'Italic', 'Underline', 'Blockquote', 'NumberedList', 'BulletedList', 'Link', 'Unlink'],
    ['Font', 'FontSize','RemoveFormat', 'TextColor','BGColor'],
];


};