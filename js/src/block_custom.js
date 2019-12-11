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
  // 許可されるブロックを登録
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