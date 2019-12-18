//カスタムクラス

//コードシンタックスブロック
wp.blocks.registerBlockStyle( 'core/code', {
	name: 'language-html',
	label: 'HTMLシンタックス',
	isDefault: false,
} );
wp.blocks.registerBlockStyle( 'core/code', {
	name: 'language-css',
	label: 'CSSシンタックス',
	isDefault: false,
} );
wp.blocks.registerBlockStyle( 'core/code', {
	name: 'language-js',
	label: 'JSシンタックス',
	isDefault: false,
} );
wp.blocks.registerBlockStyle( 'core/code', {
	name: 'language-php',
	label: 'phpシンタックス',
	isDefault: false,
} );


//カスタムブロック
const { registerBlockType } = wp.blocks;
// const { RichText }          = wp.editor;
const { InnerBlocks } = wp.editor;

registerBlockType( 'yori3/section', {

  title: 'Section',
  icon: 'info',
  category: 'layout',

  attributes: {
    content: {
      type: 'array',
      source: 'html',
      selector: 'div',
    },
  },

  edit({attributes, className}){
    return (
      <div className={className}>
        <InnerBlocks templateLock={false} />
      </div>
    )
  },

  save({className}){
    return (
      <section className={className}>
        <div className="inner">
          <InnerBlocks.Content />
        </div>
      </section>
    )
  }
} );
