'use strict';

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

    // 許可されるブロックを登録
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