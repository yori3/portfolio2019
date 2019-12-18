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
// const { RichText }          = wp.editor;

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