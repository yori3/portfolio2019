'use strict';

//カスタムクラス

//コードシンタックスブロック
wp.blocks.registerBlockStyle('core/code', {
	name: 'language-html',
	label: 'HTMLシンタックス',
	isDefault: false
});
wp.blocks.registerBlockStyle('core/code', {
	name: 'language-css',
	label: 'CSSシンタックス',
	isDefault: false
});
wp.blocks.registerBlockStyle('core/code', {
	name: 'language-js',
	label: 'JSシンタックス',
	isDefault: false
});
wp.blocks.registerBlockStyle('core/code', {
	name: 'language-php',
	label: 'phpシンタックス',
	isDefault: false
});

//カスタムブロック
var registerBlockType = wp.blocks.registerBlockType;
var RichText = wp.editor.RichText;
var InnerBlocks = wp.editor.InnerBlocks;


registerBlockType('yori3/section', {

	title: 'Section',
	icon: 'info',
	category: 'layout',

	attributes: {
		content: {
			type: 'array',
			source: 'html',
			selector: 'div'
		}
	},

	edit: function edit(_ref) {
		var attributes = _ref.attributes,
		    className = _ref.className;

		return React.createElement(
			'div',
			{ className: className },
			React.createElement(InnerBlocks, { templateLock: false })
		);
	},
	save: function save(_ref2) {
		var className = _ref2.className;

		return React.createElement(
			'section',
			{ className: className },
			React.createElement(
				'div',
				{ className: 'inner' },
				React.createElement(InnerBlocks.Content, null)
			)
		);
	}
});

registerBlockType('works/definition', {

	title: 'works-definition',
	icon: 'info',
	category: 'layout',

	edit: function edit(_ref3) {
		var attributes = _ref3.attributes,
		    className = _ref3.className;

		// 許可されるブロックを登録
		var allowedBlocks = ['works/term', 'works/description'];
		return React.createElement(
			'div',
			{ className: className },
			React.createElement(InnerBlocks, { allowedBlocks: allowedBlocks, templateLock: false })
		);
	},
	save: function save(_ref4) {
		var className = _ref4.className;

		return React.createElement(
			'dl',
			{ className: className },
			React.createElement(InnerBlocks.Content, null)
		);
	}
});

registerBlockType('works/term', {

	title: 'works-term',
	icon: 'info',
	category: 'layout',
	parent: ['custom-gutenberg-block/dl'],

	attributes: {
		content: {
			type: 'array',
			source: 'html',
			selector: 'dt'
		}
	},

	edit: function edit(_ref5) {
		var attributes = _ref5.attributes,
		    setAttributes = _ref5.setAttributes,
		    className = _ref5.className;

		return React.createElement(RichText, { className: className, tagName: 'div', value: attributes.content, onChange: function onChange(content) {
				return setAttributes({ content: content });
			} });
	},
	save: function save(_ref6) {
		var attributes = _ref6.attributes;

		return React.createElement(RichText.Content, { tagName: 'dt', value: attributes.content });
	}
});

registerBlockType('works/description', {

	title: 'works-descriotion',
	icon: 'info',
	category: 'layout',
	parent: ['custom-gutenberg-block/dl'],

	attributes: {
		content: {
			type: 'array',
			source: 'html',
			selector: 'dd'
		}
	},

	edit: function edit(_ref7) {
		var attributes = _ref7.attributes,
		    setAttributes = _ref7.setAttributes,
		    className = _ref7.className;

		return React.createElement(RichText, { className: className, tagName: 'div', value: attributes.content, onChange: function onChange(content) {
				return setAttributes({ content: content });
			} });
	},
	save: function save(_ref8) {
		var attributes = _ref8.attributes;

		return React.createElement(RichText.Content, { tagName: 'dd', value: attributes.content });
	}
});