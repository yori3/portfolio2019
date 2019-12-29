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
const { RichText } = wp.editor;
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

registerBlockType( 'works/definition', {

	  title: 'works-definition',
	  icon: 'info',
	  category: 'layout',

		edit({attributes, className}){
    // 許可されるブロックを登録
		const allowedBlocks = [ 'works/term', 'works/description' ];
	    return (
	      <div className={className}>
					<InnerBlocks allowedBlocks={allowedBlocks} templateLock={false} />
	      </div>
	    )
	  },

		save({className}){
	    return (
				<dl className={className}>
        	<InnerBlocks.Content />
				</dl>
	    )
	  }
	} );

	registerBlockType( 'works/term', {

	  title: 'works-term',
	  icon: 'info',
	  category: 'layout',
  	parent: [ 'custom-gutenberg-block/dl' ],

	  attributes: {
	    content: {
	      type: 'array',
	      source: 'html',
	      selector: 'dt',
	    },
	  },

		edit({attributes, setAttributes, className}){
	    return (
	      <RichText className={className} tagName='div' value={attributes.content} onChange={(content)=>setAttributes({content})}/>
	    )
	  },

		save({attributes}){
	    return (
				<RichText.Content tagName='dt' value={attributes.content} />
	    )
	  }
	} );

	registerBlockType( 'works/description', {

	  title: 'works-descriotion',
	  icon: 'info',
	  category: 'layout',
  	parent: [ 'custom-gutenberg-block/dl' ],

	  attributes: {
	    content: {
	      type: 'array',
	      source: 'html',
	      selector: 'dd',
	    },
	  },

		edit({attributes, setAttributes, className}){
	    return (
	      <RichText className={className} tagName='div' value={attributes.content} onChange={(content)=>setAttributes({content})}/>
	    )
	  },

		save({attributes}){
	    return (
				<RichText.Content tagName='dd' value={attributes.content} />
	    )
	  }
	} );
